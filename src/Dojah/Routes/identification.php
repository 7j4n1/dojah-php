<?php

	namespace DojahCore\Dojah\Routes;

	/**
	 * This class contains all KYC/KYB identification endpoints.
	 *
	 * @package default
	 * @author 
	 **/

	class Identification extends Core {

		
		/**
		 * Validates a bvn
		 *
		 * @param string|required bvn 
		 * @param string|optional first_name 
		 * @param string|optional last_name 
		 * @param string|optional dob 
		 *
		 * @return Json data from Dojah API
		 * 
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
		 * The Lookup BVN endpoint returns details of a particular BVN
		 *
		 * Calls the /api/v1/kyc/bvn/full.
		 *
		 * @param string|required bvn 
		 *
		 * @return Json data from Dojah API
		 * 
		 **/
		public function lookup_bvn_basic($bvn)
		{
			$this->setOptions('get', array(
				'bvn' => $bvn
			));

			return $this->getClient()->get($this->getBaseUrl . '/api/v1/kyc/bvn/full');	
		}
		/**
		 * The Lookup BVN endpoint returns details of a particular BVN.
		 *
		 * Calls the /api/v1/kyc/bvn/advance.
		 *
		 * @param string|required bvn 
		 *
		 * @return Json data from Dojah API
		 * 
		 **/
		public function lookup_bvn_advance($bvn)
		{
			$this->setOptions('get', array(
				'bvn' => $bvn
			));

			return $this->getClient()->get($this->getBaseUrl . '/api/v1/kyc/bvn/advance');	
		}
		/**
		 * The Lookup NUBAN (Nigeria Uniform Bank Account Number) endpoint provides information of users' account numbers.
		 *
		 *
		 * @param string|required account_number 
		 * @param string|required bank_code 
		 *
		 * @return Json data from Dojah API
		 * 
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
		 * This endpoint allows developers to fetch customers details.
		 * using the National Identification Number (NIN) of the customer.
		 *
		 * @param string|required nin 
		 *
		 * @return Json data from Dojah API
		 * 
		 **/
		public function lookup_nin($nin)
		{
			$this->setOptions('get', array(
				'nin' => $nin
			));

			return $this->getClient()->get($this->getBaseUrl . '/api/v1/kyc/nin');	
		}
		/**
		 * Returns the details of a phone number.
		 *
		 * @param string|required phone_number 
		 *
		 * @return Json data from Dojah API
		 * 
		 **/
		public function lookup_phone_number_basic($phone_number)
		{
			$this->setOptions('get', array(
				'phone_number' => $phone_number
			));

			return $this->getClient()->get($this->getBaseUrl . '/api/v1/kyc/phone_number/basic');	
		}
		/**
		 * Returns the details of a phone number.
		 *
		 * @param string|required phone_number 
		 *
		 * @return Json data from Dojah API
		 * 
		 **/
		public function lookup_phone_number($phone_number)
		{
			$this->setOptions('get', array(
				'phone_number' => $phone_number
			));

			return $this->getClient()->get($this->getBaseUrl . '/api/v1/kyc/phone_number');	
		}

		/**
		 * Lookup vin via date of birth.
		 *
		 * @param string|required state 
		 * @param string|required first_name 
		 * @param string|required last_name 
		 * @param string|required dob 
		 *
		 * @return Json data from Dojah API
		 * 
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
		 * Lookup vin
		 *
		 * @param string|required vin 
		 * @param string|required state 
		 * @param string|required last_name 
		 *
		 * @return Json data from Dojah API
		 * 
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
		 * Lookup vin
		 *
		 * @param number|required license_number 
		 * @param yyyy-mm-dd|required dob 
		 *
		 * @return Json data from Dojah API
		 * 
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
		 * Fetch CAC information of customers' company/organization.
		 * CAC is a certificate that shows evidence of the company's existence.
		 *
		 * @param string|required rc_number 
		 * @param string|required company_name 
		 * 
		 * @return Json data from Dojah API
		 * 
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
		 * Fetch a person's details using the Tax Identification number.
		 *
		 * @param string|required tin
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