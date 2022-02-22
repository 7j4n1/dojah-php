<?php

	namespace DojahCore\Dojah\Routes;

	class General extends Core {

		/**
		 * This endpoint returns the account name linked to an account number.
		 *
		 * 
		 * @param string|required account_number
		 * @param string|required bank_code 
		 *
		 * @return Json data from Dojah API
		 *
		 */
		public function resolve_nuban($account_number, $bank_code)
		{
			$this->setOptions('get', array(
				'account_number' => $account_number,
				'bank_code' => $bank_code
			));

			return $this->getClient()->get($this->getBaseUrl . '/api/v1/general/account');	
		}

		/**
		 *  This endpoint allow you to get Nigerian banks and their codes.
		 *
		 *
		 * @return Json data from Dojah API
		 *
		 */
		public function banks()
		{
			return $this->getClient()->get($this->getBaseUrl . '/api/v1/general/banks');
		}

		/**
		 *  Provides the details of a card.
		 *
		 * 
		 * @param string|required card_bin
		 *
		 * @return Json data from Dojah API
		 *
		 */
		public function resolve_card_bin($card_bin){
			$this->setOptions('get', array(
				'card_bin' => $card_bin
			));

			return $this->getClient()->get($this->getBaseUrl . '/api/v1/general/bin');	
		}

		/**
		 * Buy airtime across alll mobine network.
		 *
		 * 
		 * @param string|required amount
		 * @param string|required destination 
		 *
		 * @return Json data from Dojah API
		 *
		 */
		public function purchase_airtime($amount, $destination)
		{
			$this->setOptions('post', array(
				'amount' => $amount,
				'destination' => $destination
			));

			return $this->getClient()->post($this->getBaseUrl . '/api/v1/purchase/airtime');
		}
		/**
		 * Buy Data
		 *
		 * 
		 * @param string|required plan
		 * @param string|required destination 
		 *
		 * @return Json data from Dojah API
		 *
		 */
		public function purchase_data($plan, $destination)
		{
			$this->setOptions('post', array(
				'plan' => $plan,
				'destination' => $destination
			));

			return $this->getClient()->post($this->getBaseUrl . '/api/v1/purchase/data');
		}

		/**
		 * Get data plans.
		 *
		 * 
		 * @param string|optional plan
		 *
		 * @return Json data from Dojah API
		 *
		 */
		public function data_plans($plan='')
		{
			if (!empty($plan)) {
				$this->setOptions('get', array(
					'plan' => $plan
				));
			}
			

			return $this->getClient()->get($this->getBaseUrl . '/api/v1/data/plans');
		}

		/**
		 * Returns your Dojah Wallet Balance.
		 *
		 * @return Json data from Dojah API
		 *
		 */
		public function my_dojah_balance()
		{
			return $this->getClient()->get($this->getBaseUrl . '/api/v1/balance');
		}
	}