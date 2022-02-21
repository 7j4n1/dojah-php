<?php

	namespace DojahCore\Dojah\Routes;

	class General extends Core {

		/**
		 * This end point returns the account number
		 *
		 * @return return account name linked to an account number
		 * @param account_number -> string - required
		 * @param bank_code -> string - required 
		 * @author 
		 *
		 **/
		public function resolve_nuban($account_number, $bank_code)
		{
			$this->setOptions('get', array(
				'account_number' => $account_number,
				'bank_code' => $bank_code
			));

			return $this->getClient()->get($this->getBaseUrl . '/api/v1/general/account');	
		}

		/**
		 * undocumented function
		 *
		 * @return Json data from Dojah API
		 * @author 
		 * 
		 **/
		public function banks()
		{
			return $this->getClient()->get($this->getBaseUrl . '/api/v1/general/banks');
		}

		/**
		 * undocumented function
		 *
		 * @return Json Data from Dojah API
		 * @author 
		 **/
		public function resolve_card_bin($card_bin){
			$this->setOptions('get', array(
				'card_bin' => $card_bin
			));

			return $this->getClient()->get($this->getBaseUrl . '/api/v1/general/bin');	
		}

		/**
		 * undocumented function
		 *
		 * @return Json data from Dojah API
		 * @author 
		 **/
		public function purchase_airtime($amount, $destination)
		{
			$this->setOptions('post', array(
				'amount' => $amount,
				'destination' => $destination
			));

			return $this->getClient()->post($this->getBaseUrl . '/api/v1/purchase/airtime');
		}
		/**
		 * undocumented function
		 *
		 * @return Json data from Dojah API
		 * @author 
		 **/
		public function purchase_data($plan, $destination)
		{
			$this->setOptions('post', array(
				'plan' => $plan,
				'destination' => $destination
			));

			return $this->getClient()->post($this->getBaseUrl . '/api/v1/purchase/data');
		}

		/**
		 * undocumented function
		 *
		 * @return Json data from Dojah API
		 * @author 
		 **/
		public function data_plans($plan='')
		{
			if ($plan !== '') {
				$this->setOptions('get', array(
					'plan' => $plan
				));
			}
			

			return $this->getClient()->get($this->getBaseUrl . '/api/v1/data/plans');
		}

		/**
		 * undocumented function
		 *
		 * @return void
		 * @author 
		 **/
		public function my_dojah_balance()
		{
			return $this->getClient()->get($this->getBaseUrl . '/api/v1/balance');
		}
	}