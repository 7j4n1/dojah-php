<?php

	namespace DojahCore\Dojah\Routes;

	use \DojahCore\Dojah\Http\HttpClient;
	use \Exception;
	use \RuntimeException;
	// use \dojahcore;

	abstract class Core {
		private $client;
		private $_option;
		public $getBaseUrl;
		protected $API_KEY;
		protected $APP_ID,
		private $API_URL;
		/**
		 * undocumented class variable
		 *
		 * @var Api_key
		 * @var Api_Id
		 *
		 **/
		public function __construct(){
			$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
			$dotenv->load();
		
			// Get the API_KEY and APP_ID FROM ENVIRONMENT
			$this->API_KEY = getenv("API_KEY");
			$this->APP_ID = getenv("APP_ID");

			// check if it is a testing key or not
			
			$this->API_URL = (substr($this->API_KEY, 0, 4) == "test") ? 'https://sandbox.dojah.io' : 'https://api.dojah.io' ;
			$this->getBaseUrl = $this->API_URL;
			$this->client = new HttpClient();

			$this->client->getClient()->setHeaders(array(
				"Authorization: " . $this->API_KEY,
				"AppId: " . $this->APP_ID,
				"Content-Type: application/json"
			));
		}

		// public function fetch()
		// {
		// 	if (!is_string($this->getEndpoint()))
		// 		throw new RuntimeException("An endpoint must be defined.");

		// 	return $this->client->get($this->getBaseUrl . $this->getEndpoint());
		// }
		// public function post()
		// {
		// 	if (!is_string($this->getEndpoint()))
		// 		throw new RuntimeException("An endpoint must be defined.");

		// 	return $this->client->post($this->getBaseUrl . $this->getEndpoint());	
		// }

		public function setOptions($method='', $value)
		{
			$this->_option = $value;
			if ($method === 'get') {
				$this->client->setParameters($method, $this->_option);
			}else{
				$this->client->setParameters('post', $this->_option);
			}
			

			return $this; 
		}

		public function getOptions()
		{
			return $this->_option;
		}

		public function getClient()
		{
			return $this->client;
		}

		public function setClient($client)
		{
			$this->client = $client;
		}
	}