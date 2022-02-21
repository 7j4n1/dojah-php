<?php

	namespace DojahCore\Dojah\Routes;

	class Messaging extends Core {

		/**
		 * undocumented function
		 *
		 * @return Json data from Dojah API
		 * @author 
		 **/
		public function send_message($sender_id,$channel,$destination,$message,$priority=false)
		{
			$this->setOptions('post', array(
				'sender_id' => $sender_id,
				'channel' => $channel,
				'destination' => $destination,
				'message' => $message,
				'priority' => $priority
			));

			return $this->getClient()->post($this->getBaseUrl . '/api/v1/messaging/sms');	
		}

		/**
		 * undocumented function
		 *
		 * @return Json data from Dojah API
		 * @author 
		 **/
		public function register_sender_id($sender_id)
		{
			if (strlen($sender_id) >= 11) {
				throw new Exception("sender id should be less than 11 characters");
			}
			$this->setOptions('post', array(
				'sender_id' => $sender_id,
			));

			return $this->getClient()->post($this->getBaseUrl . '/api/v1/messaging/sender_id');	
		}

		/**
		 * undocumented function
		 *
		 * @return Json data from Dojah API
		 * @author 
		 **/
		public function fetch_sender_ids()
		{
			return $this->getClient()->get($this->getBaseUrl . '/api/v1/messaging/sender_ids');	
		}

		/**
		 * undocumented function
		 *
		 * @return Json data from Dojah API
		 * @author 
		 **/
		public function get_status($message_id)
		{
			

			return $this->getClient()->get($this->getBaseUrl . '/api/v1/messaging/sms/get_status');	
		}
		
		/**
		 * undocumented function
		 *
		 * @return Json data from Dojah API
		 * @author 
		 **/
		public function send_otp($sender_id,$destination,$channel,$expiry=10,$length=6,$priority=false,$opt=null)
		{
			$body = array(
				'sender_id' => $sender_id,
				'destination' => $destination,
				'expiry' => $expiry,
				'length' => $length,
				'priority' => $priority
			);
			if (!is_null($opt))
				if (strlen($opt) < 4 || strlen($opt) > 10) 
					throw new Exception("Length of token should be between 4-10 digits");
			
			if (!in_array($channel, array('sms', 'whatsapp', 'voice')))
				throw new Exception("Channel should be either of sms, whatsapp or voice");
				
			$body['channel'] = $channel;
			$body['opt'] = $opt;
			
			$this->setOptions('post', $body);

			return $this->getClient()->post($this->getBaseUrl . '/api/v1/messaging/opt');	
		}

		/**
		 * undocumented function
		 *
		 * @return Json data from Dojah API
		 * @author 
		 **/
		public function validate_otp($code, $reference_id)
		{
			$query = array(
				'code' => $code,
				'reference_id' => $reference_id
			);

			$this->setOptions('get', $query);
			return $this->getClient()->get($this->getBaseUrl . '/api/v1/messaging/opt/validate');	
		}

	}