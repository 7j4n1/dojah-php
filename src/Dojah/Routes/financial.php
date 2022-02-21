<?php

	namespace DojahCore\Dojah\Routes;

	class Financial extends Core {

		/**
		 * This end point returns the bank account information of a customer
		 *
		 * @return JSON data from Dojah API
		 * @param account_id -> string - required
		 * @author 
		 *
		 **/
		public function account_information(string $account_id)
		{
			$this->setOptions('get', array(
				'account_id' => $account_id
			));

			return $this->getClient()->get($this->getBaseUrl . '/api/v1/financial/account_information');	
		}

		/**
		 * undocumented function
		 *
		 * @return Json data from Dojah API
		 * @author 
		 * 
		 **/
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
		 * undocumented function
		 *
		 * @return Json Data from Dojah API
		 * @author 
		 **/
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
		 * undocumented function
		 *
		 * @return Json data from Dojah API
		 * @author 
		 **/
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
		 * undocumented function
		 *
		 * @return Json data from Dojah API
		 * @author 
		 **/
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
		 * undocumented function
		 *
		 * @return Json data from Dojah API
		 * @author 
		 **/
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
		 * undocumented function
		 *
		 * @return void
		 * @author 
		 **/
		public function send_transactions($transactions)
		{
			$this->setOptions('post', array(
				'transactions' => $transactions
			));

			return $this->getClient()->post($this->getBaseUrl . '/api/v1/financial/transactions');	
		}
		/**
		 * undocumented function
		 *
		 * @return void
		 * @author 
		 **/
		public function update_transactions($account_id, $transactions)
		{
			$this->setOptions('put', array(
				'transactions' => $transactions
			));

			return $this->getClient()->put($this->getBaseUrl . '/api/v1/financial/transactions/' . $account_id);	
		}
	}