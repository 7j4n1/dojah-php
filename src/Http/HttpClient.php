<?php

	namespace DojahCore\Http;

	use \DojahCore\Contracts\RouteInterface;

	class HttpClient {
		private 
			$_getParam,
			$_postParam,
			$_ch;


		public function __construct() {
			// Initialize curl
			try {
				$this->_ch = \curl_init();
			} catch (\Exception $e) {
				throw new \Exception("Curl cannot be Initialized. Check if cUrl is enabled.");
			}

			// if Initialized successfully
			//set cUrl options
			\curl_setopt($this->_ch, \CURLOPT_RETURNTRANSFER, true);
			\curl_setopt($this->_ch, \CURLOPT_ENCODING, "");

			
		}

		public function setHeaders($header){
			\curl_setopt($this->_ch, \CURLOPT_HTTPHEADER, $header);
		}

		public function setParameters($method, $values, $json = true)
		{
			if ($method === RouteInterface::GET_METHOD) {
				$this->_getParam = $values;
			}elseif ($method === RouteInterface::POST_METHOD) {
				$this->_postParam = $values;

				if ($json) {
					\curl_setopt($this->_ch, \CURLOPT_POST, true);
					\curl_setopt($this->_ch, \CURLOPT_POSTFIELDS, \json_encode($this->_postParam));
				}else {
					\curl_setopt($this->_ch, \CURLOPT_POSTFIELDS, http_build_query($this->_postParam));
				}
			}
		}

		public function get($url)
		{
			if (isset($this->_getParam))
				// construct a get query
				$url = $url . '?' . http_build_query($this->_getParam);

			\curl_setopt($this->_ch, \CURLOPT_URL, $url);

			// set response
			$response = $this->exec();

			return $this->checkResp($response);
		}

		public function post($url)
		{
			\curl_setopt($this->_ch, \CURLOPT_URL, $url);
			\curl_setopt($this->_ch, \CURLOPT_CUSTOMREQUEST, "POST");

			// set response
			$response = $this->exec();

			return $this->checkResp($response);
		}

		public function put($url)
		{
			\curl_setopt($this->_ch, \CURLOPT_URL, $url);
			\curl_setopt($this->_ch, \CURLOPT_CUSTOMREQUEST, "PUT");

			// set response
			$response = $this->exec();

			return $this->checkResp($response);
		}

		public function exec()
		{
			$response = \curl_exec($this->_ch);

			if (\curl_error($this->_ch)) {
				throw new \RuntimeException("Api request failed: " . curl_error($this->_ch));
			}

			return $response;
		}

		public function checkResp($response)
		{
			$status = \curl_getinfo($this->_ch, \CURLINFO_HTTP_CODE);

			$response = json_decode($response, true, 512, JSON_BIGINT_AS_STRING);

			// if (($status !== 200) || ($status !== 401)) {
			// 	throw new \Exception("Something went wrong: " . " : Status_code : " . $status);
			// }

			if (isset($response['entity'])) {
				$response = $response['entity'];
			}else if(isset($response['error'])) {
				$response = $response['error'];
			}else {
				$response = $response;
			}
			
			return $response;
		}

		public function __destruct(){
			// close curl on destruction
			\curl_close($this->_ch);
		}
	}