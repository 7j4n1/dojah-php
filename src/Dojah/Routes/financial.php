<?php

	namespace DojahCore\Dojah\Routes;

	/**
	 * The financial services APIs are available to retrieve financial information of users from various banks via internet banking.
	 * To make use of these APIs, you must have been verified on the Dojah app.
	 *
	 * The widget is the interface your users see when they need to submit the internet details.
	 * You can set up the widget here.
	 *
	 * Our financial widget process flow:
	 * @link https://api-docs.dojah.io/docs/financial-widget
	 * Your application allows your end users to launch the widget
	 * The end user fills the registration process which includes selecting financial institution etc.
	 *
	 * After successful completion, the widget returns a secret key in your Dojah application which would be used to make APIs calls
	 *
	 * @package default
	 * @author 
	 **/
	class Financial extends Core {

		/**
		 * Retrieves the bank account information of a customer.
		 *
		 * 
		 * @param string|required account_id
		 *
		 * @return Json data from Dojah API
		 *
		 */
		public function account_information(string $account_id)
		{
			$this->setOptions('get', array(
				'account_id' => $account_id
			));

			return $this->getClient()->get($this->getBaseUrl . '/api/v1/financial/account_information');	
		}

		/**
		 * This endpoint allows users retrieve customer's transaction details from their bank accounts.
	     * Transaction details include the bank name linked to the transaction, amount, location, transaction type (credit or debit), time,
		 * and date of occurrence.
		 *
		 * 
		 * @param string|required account_id Gotten from the financial widget. 
		 * @param string|optional last_transaction_id Oldest transaction ID you want to start with.
		 * @param string|optional start_date the start date of transaction you want to get.
		 * @param string|optional end_date => the end date of transaction you want to get. 
		 * @param string|optional trans_type => (debit or credit). 
		 * @param string|optional response_mode => Your preferred mode of results. (paginated,not_paginated, or webhook) Defaults to paginated.
		 * @param string|optional callback_url => callback url used as webhook.
		 *
		 * @return Json data from Dojah API
		 *
		 */
		public function account_transactions($account_id, $last_transaction_id=null,$start_date=null,$end_date=null, $trans_type=null, $response_mode=null, $callback_url=null)
		{
			$query = array(
				'account_id' => $account_id
			);
			if (!is_null($last_transaction_id))
				$query['last_transaction_id'] = $last_transaction_id;
			if (!is_null($start_date))
				$query['start_date'] = $start_date;
			if (!is_null($end_date))
				$query['end_date'] = $end_date;
			if (!is_null($trans_type)){
				if (in_array($trans_type, array('debit', 'credit'))) {
					$query['trans_type'] = $trans_type;
				}else{
					throw new Exception("transaction type should be credit or debit");
				}
			}
			if (!is_null($response_mode)){
				if ($response_mode === 'webhook' && is_null($callback_url))
					throw new Exception("Callback Url required for webhook response type");
					
				if (in_array($response_mode, array('paginated', 'not_paginated','webhook'))) {
					$query['response_mode'] = $response_mode;
				}else{
					throw new Exception("response_mode should be paginated, not_paginated or webhook");
				}
			}
			if (!is_null($callback_url))
				$query['callback_url'] = $callback_url;

			$this->setOptions('get', $query);
				
			return $this->getClient()->get($this->getBaseUrl . '/api/v1/financial/account_transactions');
		}

		/**
		 * This endpoint allows you to retrieve recurring payments that occur daily,
		 * weekly, monthly, or yearly from transactions.
		 * The endpoint returns the transaction date, amount, the name of the service that the service subscribed to (e.g. Netflix),
		 * the subscription duration (i.e. yearly or monthly subscription), etc.
		 * 
		 * @param string|required account_id => Gotten from the financial widget. 
		 * @param string|optional start_date => the start date of transaction you want to get.
		 * @param string|optional end_date => the end date of transaction you want to get. 
		 * @param string|optional status => (expired or not_expired). 
		 *
		 * @return Json data from Dojah API
		 *
		 */		
		public function account_subscription($account_id, $start_date=null,$end_date=null, $status=null)
		{
			$query = array(
				'account_id' => $account_id
			);
			
			if (!is_null($start_date))
				$query['start_date'] = $start_date;
			if (!is_null($end_date))
				$query['end_date'] = $end_date;
			if (!is_null($status)){
				if (in_array($status, array('expired', 'not_expired'))) {
					$query['status'] = $status;
				}else{
					throw new Exception("status should be either of expired or not_expired");
				}
			}

			$this->setOptions('get', $query);
				
			return $this->getClient()->get($this->getBaseUrl . '/api/v1/financial/account_subscription');
		}

		/**
		 * This endpoint allows developers to determine if a customer is a salary earner, and to determine the amount of employer's income.
		 *
		 * 
		 * @param string|required account_id => gotten from the widget.
		 * @param string|optional duration => (6_months,12_months,24_months).
		 *
		 * @return Json data from Dojah API
		 *
		 */
		public function earning_structure($account_id, $duration)
		{
			$query = array(
				'account_id' => $account_id
			);
			if (in_array($duration, array('6_month', '12_months','24_months')))
				$query['duration'] = $duration;

			$this->setOptions('get', $query);
				
			return $this->getClient()->get($this->getBaseUrl . '/api/v1/financial/earning_structure');
		}
		/**
		 * This endpoint gives insights on users' spending habits based on transactions, and it comes in percentages.
		 *
		 * 
		 * @param string|required account_id => gotten from the widget.
		 * @param string|optional duration => (6_months,12_months,24_months).
		 *
		 * @return Json data from Dojah API
		 *
		 */
		public function spending_pattern($account_id, $duration)
		{
			$query = array(
				'account_id' => $account_id
			);
			if (in_array($duration, array('6_month', '12_months','24_months')))
				$query['duration'] = $duration;

			$this->setOptions('get', $query);
				
			return $this->getClient()->get($this->getBaseUrl . '/api/v1/financial/spending_pattern');
		}

		/**
		 * This endpoint allows you to categorize your transactions
		 *	using our machine learning model and merchant validation system.
		 *
		 * 
		 * @param string|required description|description of the transaction.
		 * @param string|required trans_type|(debit or credit). 
		 *
		 * @return Json data from Dojah API
		 *
		 */
		public function categorize_transactions($description, $trans_type)
		{
			if(empty($description))
				throw new Exception("Description cannot be none");
				
			$body = array(
				'description' => $description
			);
			if (!empty($trans_type)){
				if (in_array($trans_type, array('credit', 'debit'))) {
					$body['trans_type'] = $trans_type;
				
				}else {
					throw new Exception("trans_type can either be credit or debit");
					
				}
			}else {
				throw new Exception("trans_type can not be none");
					
			}

			$this->setOptions('post', $body);
				
			return $this->getClient()->get($this->getBaseUrl . '/api/v1/ml/categorize_transactions');
		}

		/**
		 * This endpoint will post the transactions and return an account_id.
		 *
		 * 
		 * @param array|required transactions
		 *		$sample = array(
		 *			"transaction_date" => "2021-04-30",
		 *			"transaction_type" => "credit",
		 *			"transaction_amount" => "2016.4",
		 *			"transaction_number" => "12345tgfnde",
		 *			"transaction_description" => "0033199479:Int.Pd:01-04-2021 to 30-04-2"
		 *		)
		 *
		 * @return Json data from Dojah API
		 *
		 */
		public function send_transactions($transactions)
		{
			$this->setOptions('post', array(
				'transactions' => $transactions
			));

			return $this->getClient()->post($this->getBaseUrl . '/api/v1/financial/transactions');	
		}
		/**
		 * This endpoint will update transactions.
		 *
		 * 
		 * @param array|required transactions
		 *		$sample = array(
		 *			"transaction_date" => "2021-04-30",
		 *			"transaction_type" => "credit",
		 *			"transaction_amount" => "2016.4",
		 *			"transaction_number" => "12345tgfnde",
		 *			"transaction_description" => "0033199479:Int.Pd:01-04-2021 to 30-04-2"
		 *		)
		 *
		 * @return Json data from Dojah API
		 *
		 */
		public function update_transactions($account_id, $transactions)
		{
			$this->setOptions('put', array(
				'transactions' => $transactions
			));

			return $this->getClient()->put($this->getBaseUrl . '/api/v1/financial/transactions/' . $account_id);	
		}
	}