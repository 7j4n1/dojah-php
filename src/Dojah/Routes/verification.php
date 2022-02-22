<?php

	namespace DojahCore\Dojah\Routes;

	/**
	 * This class contains all KYC/KYB identification endpoints.
	 * To ensure that your customer is who they say they are, you can allow them take a selfie photo which you can pass on to the Dojah for 
	 * verification process.
	 * This helps to significantly reduce the possibility of fraud by confirming the person using your product is the account owner at the 
	 * validated bank.
	 * Note that; Confidence value is used to verify match and values from 90 are considered false.
	 *
	 * TODO : 1. Wrap the response, raise error as appropriate or not
	 * 2. Clean endpoint
	 *
	 * @package default
	 * @author 
	 **/

	class Verification extends Core {

		/**
		 * Age Identity and Verification allows you to confirm and ascertain information summitted by your end users.
		 * With this endpoint, Dojah can help you verify first name, middle name by simply adding it to the request body.
		 * Information Required; Phone Number OR Account Number OR BVN.
		 *
		 * 
		 * @param string|required mode (phone_number,account_number or bvn)
		 * @param bool strict default is false.
		 * @param string|required mode_value (value of the mode specified)
		 * @param string|required first_name
		 * @param string|required last_name
		 *
		 * @return Json data from Dojah API
		 *
		 */
		public function verify_age($mode,$mode_value,$first_name,$last_name,$strict=false)
		{
			$query = array(
				'mode' => $mode,
				'mode_value' => $mode_value,
				'first_name' => $first_name,
				'last_name' => $last_name 
			);

			$this->setOptions('get',$query);

			return $this->getClient()->get($this->getBaseUrl . '/api/v1/kyc/age_verification');	
		}		

		/**
		 * This endpoint allows you to verifies your customers with their selfie images and their valid BVN.
		 *
		 * 
		 * @param string|required bvn
		 * @param string|required selfie_image	base64 value of the selfie image.
		 *
		 * @return Json data from Dojah API
		 *
		 */
		public function verify_bvn_selfie($bvn,$selfie_image)
		{
			$body = array(
				'bvn' => $bvn,
				'selfie_image' => $selfie_image 
			);

			$this->setOptions('post',$body);

			return $this->getClient()->post($this->getBaseUrl . '/api/v1/kyc/bvn/verify');	
		}

		/**
		 * This endpoint identify and verifies a person using their selfie image and their valid NIN.
		 *
		 * 
		 * @param string|required nin
		 * @param string|required selfie_image	base64 value of the selfie image.
		 *
		 * @return Json response from Dojah API
		 *
		 */
		public function verify_nin_selfie($nin,$selfie_image)
		{
			$body = array(
				'nin' => $nin,
				'selfie_image' => $selfie_image 
			);

			$this->setOptions('post',$body);

			return $this->getClient()->post($this->getBaseUrl . '/api/v1/kyc/nin/verify');	
		}
		/**
		 * This endpoint verifies an individual's identity using their photo id and a selfie image.
		 *
		 * 
		 * @param string|required photo_id 		photo image in base64.
		 * @param string|required selfie_image	base64 value of the selfie image
		 * @param string|optional last_name
		 * @param string|optional first_name
		 *
		 * @return Json response from Dojah API
		 *
		 */
		public function verify_photoid_selfie($photo_id,$selfie_image,$last_name=null,$first_name=null)
		{
			$body = array(
				'photo_id' => $photo_id,
				'selfie_image' => $selfie_image 
			);

			if(!is_null($last_name))
				$body['last_name'] = $last_name;

			if(!is_null($first_name))
				$body['first_name'] = $first_name;

			$this->setOptions('post', $body);

			return $this->getClient()->post($this->getBaseUrl . '/api/v1/kyc/photoid/verify');	
		}
	}