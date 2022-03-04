<?php

	namespace DojahCore\Dojah\Routes;

	class Wallet extends Core {

		/**
		 * With this endpoint, you can easily retrieve information and details of a created wallet.
		 *
		 * 
		 * @param string|required dob (07-Aug-1958). 
		 * @param string|required phone_number 
		 * @param string|optional bvn 
		 * @param string|optional middle_name 
		 * @param string|required last_name 
		 * @param string|required first_name 
		 *
		 * @return Json data from Dojah API
		 **/
		public function create($dob,$phone_number,$last_name,$first_name,$bvn=null,$middle_name=null)
		{
			$body = array(
				'dob' => $dob,
				'phone_number' => $phone_number,
				'last_name' => $last_name,
				'first_name' => $first_name 
			);

			if(!is_null($bvn))
				$body['bvn'] = $bvn;

			if(!is_null($middle_name))
				$body['middle_name'] = $middle_name;

			$this->setOptions('post'$body);

			return $this->getClient()->post($this->getBaseUrl . '/api/v1/wallet/ngn/create');	
		}		

		/**
		 * Get details of a transaction.
		 *
		 * 
		 * @param string|required transaction_id 
		 *
		 * @return Json data from Dojah API
		 **/
		public function transaction($transaction_id)
		{
			if(empty($transaction_id) or is_null($transaction_id))
				throw new Exception("transaction id cannot be Null or empty");
				
			$query = array(
				'transaction_id' => $transaction_id
			);

			$this->setOptions('get',$query);

			return $this->getClient()->get($this->getBaseUrl . '/api/v1/wallet/ngn/transaction');	
		}

		/**
		 * With this endpoint, you can easily retrieve information and details of a created wallet.
		 *
		 * 
		 * @param string|required wallet_id 
		 *
		 * @return Json data from Dojah API
		 **/
		public function details($wallet_id)
		{
			$query = array(
				'wallet_id' => $wallet_id
			);

			$this->setOptions('get',$query);

			return $this->getClient()->get($this->getBaseUrl . '/api/v1/wallet/ngn/retrieve');	
		}
		/**
		 * This endpoint allows users retrieve customer's transaction details from their bank accounts.
	     * Transaction details include the bank name linked to the transaction, amount, location, transaction type (credit or debit), time,
		 * and date of occurrence.
		 *
		 * 
		 * @param string|required amount 
		 * @param string|required recipient_bank_code 
		 * @param string|optional recipient_account_number
		 * @param string|required wallet_id 
		 *
		 * @return Json data from Dojah API
		 *
		 */
		public function transfer_funds($amount,$recipient_bank_code,$recipient_account_number,$wallet_id)
		{
			$body = array(
				'wallet_id' => $wallet_id,
				'amount' => $amount,
				'recipient_bank_code' => $recipient_bank_code,
				'recipient_account_number' => $recipient_account_number
			);

			$this->setOptions('post',$query);

			return $this->getClient()->post($this->getBaseUrl . '/api/v1/wallet/ngn/transfer');	
		}
		/**
		 * Get all transactions in a wallet.
		 *
		 * 
		 * @param string|required wallet_id 
		 *
		 * @return Json data from Dojah API
		 **/
		public function transactions($wallet_id)
		{
			$query = array(
				'wallet_id' => $wallet_id
			);

			$this->setOptions('get',$query);

			return $this->getClient()->get($this->getBaseUrl . '/api/v1/wallet/ngn/transactions');	
		}
	}