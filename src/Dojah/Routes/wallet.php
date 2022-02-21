<?php

	namespace DojahCore\Dojah\Routes;

	class Wallet extends Core {

		/**
		 * undocumented function
		 *
		 * @return Json data from Dojah API
		 * @author 
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
		 * undocumented function
		 *
		 * @return Json data from Dojah API
		 * @author 
		 **/
		public function transaction($transaction_id)
		{
			if(empty($transaction_id))
				throw new Exception("transaction id cannot be None or empty");
				
			$query = array(
				'transaction_id' => $transaction_id
			);

			$this->setOptions('get',$query);

			return $this->getClient()->get($this->getBaseUrl . '/api/v1/wallet/ngn/transaction');	
		}

		/**
		 * undocumented function
		 *
		 * @return Json data from Dojah API
		 * @author 
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
		 * undocumented function
		 *
		 * @return Json data from Dojah API
		 * @author 
		 **/
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
		 * undocumented function
		 *
		 * @return Json data from Dojah API
		 * @author 
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