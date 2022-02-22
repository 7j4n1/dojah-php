<?php

	namespace DojahCore\Dojah\Routes;

	class Messaging extends Core {

		/**
		 * This endpoint allows you to deliver transactional messages to your customer.
		 *
		 * 
		 * @param string|required sender_id your sender ID.
		 * @param string|required channel sms or whatsapp.
		 * @param string|required destination phone number of recipient.
		 * @param string|required message body of message.
		 * @param bool|optional priority indicates if you want to send in priority mode.
		 *
		 * @return Json data from Dojah API
		 *
		 */
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
		 * Register your Sender ID with this endpoint,
		 * you will get an email once it has been approved,
	 	 * all messages sent before then will be delivered with the default sender ID.
		 *
		 * 
		 * @param string|required sender_id less than 11 characters.
		 *
		 * @return Json data from Dojah API
		 *
		 */
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
		 * Fetches all sender Ids associated with your account.
		 *
		 *
		 * @return Json data from Dojah API
		 *
		 */
		public function fetch_sender_ids()
		{
			return $this->getClient()->get($this->getBaseUrl . '/api/v1/messaging/sender_ids');	
		}

		/**
		 * This endpoint allows you get the delivery status of messages.
		 *
		 * 
		 * @param string|required message_id
		 *
		 * @return Json data from Dojah API
		 *
		 */
		public function get_status($message_id)
		{
			$this->setOptions('get', array('message_id' => $message_id));

			return $this->getClient()->get($this->getBaseUrl . '/api/v1/messaging/sms/get_status');	
		}
		
		/**
		 * Deliver OTPs to your users via multiple channels such as whatsapp, voice, and sms.
		 *
		 * 
		 * @param string|required sender_id 	-registered Sender ID.
		 * @param string|required destination 	-phone number of recipient.
		 * @param string|required channel 	-can be either whatsapp, sms, or voice.
		 * @param number|optional expiry 	-number of minutes before token becomes Invalid. Default is 10.
		 * @param number|optional length 	-length of token(4 to 10 characters), default is 6 characters.
		 * @param bool|optional priority 	-indicate if you want to send in priority mode. Default is false.
		 * @param number|optional opt 	-length of token should be between 4-10 digits which is optional.
		 *
		 * @return Json data from Dojah API
		 *
		 */
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
		 * Validates OTP received from user.
		 *
		 * 
		 * @param string|required code 	OTP received from user.
		 * @param string|required reference_id 	ID to identify the OTP.
		 *
		 * @return Json data from Dojah API
		 *
		 */
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