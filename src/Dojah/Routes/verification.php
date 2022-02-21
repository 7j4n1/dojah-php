<?php

	namespace DojahCore\Dojah\Routes;

	class Verification extends Core {

		/**
		 * undocumented function
		 *
		 * @return Json data from Dojah API
		 * @author 
		**/
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
		 * undocumented function
		 *
		 * @return Json data from Dojah API
		 * @author 
		 **/
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
		 * undocumented function
		 *
		 * @return Json data from Dojah API
		 * @author 
		 **/
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
		 * undocumented function
		 *
		 * @return Json data from Dojah API
		 * @author 
		 **/
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