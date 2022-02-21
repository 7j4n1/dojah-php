<?php

	namespace DojahCore\Dojah\Routes;

	class Identification extends Core {

		
		/**
		 * undocumented function
		 *
		 * @return Json data from Dojah API
		 * @author 
		 **/
		public function validate_bvn($bvn,$first_name=null,$last_name=null,$dob=null)
		{
			$query = array(
				'bvn' => $bvn
			);

			if (!is_null($first_name))
				$query['first_name'] = $first_name;
			if (!is_null($last_name))
				$query['last_name'] = $last_name;
			if (!is_null($dob))
				$query['dob'] = $dob;

			$this->setOptions('get', $query);

			$response = $this->getClient()->get($this->getBaseUrl . '/api/v1/kyc/bvn');	

			return $response; // Make sure to write utility function to parse this response
		}
		/**
		 * undocumented function
		 *
		 * @return Json data from Dojah API
		 * @author 
		 **/
		public function lookup_bvn_basic($bvn)
		{
			$this->setOptions('get', array(
				'bvn' => $bvn
			));

			return $this->getClient()->get($this->getBaseUrl . '/api/v1/kyc/bvn/full');	
		}
		/**
		 * undocumented function
		 *
		 * @return Json data from Dojah API
		 * @author 
		 **/
		public function lookup_bvn_advance($bvn)
		{
			$this->setOptions('get', array(
				'bvn' => $bvn
			));

			return $this->getClient()->get($this->getBaseUrl . '/api/v1/kyc/bvn/advance');	
		}
		/**
		 * undocumented function
		 *
		 * @return Json data from Dojah API
		 * @author 
		 **/
		public function lookup_nuban($account_number,$bank_code)
		{
			$this->setOptions('get', array(
				'account_number' => $account_number,
				'bank_code' => $bank_code
			));

			return $this->getClient()->get($this->getBaseUrl . '/api/v1/kyc/nuban');	
		}
		/**
		 * undocumented function
		 *
		 * @return Json data from Dojah API
		 * @author 
		 **/
		public function lookup_nin($nin)
		{
			$this->setOptions('get', array(
				'nin' => $nin
			));

			return $this->getClient()->get($this->getBaseUrl . '/api/v1/kyc/nin');	
		}
		/**
		 * undocumented function
		 *
		 * @return Json data from Dojah API
		 * @author 
		 **/
		public function lookup_phone_number_basic($phone_number)
		{
			$this->setOptions('get', array(
				'phone_number' => $phone_number
			));

			return $this->getClient()->get($this->getBaseUrl . '/api/v1/kyc/phone_number/basic');	
		}
		/**
		 * undocumented function
		 *
		 * @return Json data from Dojah API
		 * @author 
		 **/
		public function lookup_phone_number($phone_number)
		{
			$this->setOptions('get', array(
				'phone_number' => $phone_number
			));

			return $this->getClient()->get($this->getBaseUrl . '/api/v1/kyc/phone_number');	
		}

		/**
		 * undocumented function
		 *
		 * @return Json data from Dojah API
		 * @author 
		 **/
		public function lookup_vin_dob($state,$first_name,$last_name,$dob)
		{
			$this->setOptions('get', array(
				'mode' => 'dob',
				'state' => $state,
				'first_name' => $first_name,
				'last_name' => $last_name,
				'dob' => $dob
			));

			return $this->getClient()->get($this->getBaseUrl . '/api/v1/kyc/vin');	
		}
		/**
		 * undocumented function
		 *
		 * @return Json data from Dojah API
		 * @author 
		 **/
		public function lookup_vin($vin,$state,$last_name)
		{
			$this->setOptions('get', array(
				'mode' => 'vin',
				'state' => $state,
				'last_name' => $last_name,
				'vin' => $vin
			));

			return $this->getClient()->get($this->getBaseUrl . '/api/v1/kyc/vin');	
		}
		/**
		 * undocumented function
		 *
		 * @return Json data from Dojah API
		 * @author 
		 **/
		public function lookup_driver_license($license_number,$dob)
		{
			$this->setOptions('get', array(
				'license_number' => $license_number,
				'dob' => $dob
			));

			return $this->getClient()->get($this->getBaseUrl . '/api/v1/kyc/dl');	
		}
		/**
		 * undocumented function
		 *
		 * @return Json data from Dojah API
		 * @author 
		 **/
		public function lookup_cac($rc_number,$company_name)
		{
			$this->setOptions('get', array(
				'rc_number' => $rc_number,
				'company_name' => $company_name
			));

			return $this->getClient()->get($this->getBaseUrl . '/api/v1/kyc/cac');	
		}
		/**
		 * undocumented function
		 *
		 * @return Json data from Dojah API
		 * @author 
		 **/
		public function lookup_tin($tin)
		{
			$this->setOptions('get', array(
				'tin' => $tin
			));

			return $this->getClient()->get($this->getBaseUrl . '/api/v1/kyc/tin');	
		}
	}