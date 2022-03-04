<?php

	namespace DojahCore;

	use DojahCore\Routes;
	use DojahCore\Routes\Core;
	use DojahCore\Routes\General;
	use DojahCore\Routes\Financial;
	use DojahCore\Routes\Wallet;

	class Dojah {

		public $general;
		public $financial;
		public $wallet;
		public $identification;
		public $messaging;
		public $verification;

		public function __constructor(){
		}

		// public function general()
		// {
		// 	$this->general = new General();
		// 	return $this->general;
		// }

		public function __call($name,$arguments)
		{
			$className = __NAMESPACE__ . '\\Routes\\' . ucfirst($name);

			if (!class_exists($className)) {
				throw new \InvalidArgumentException("$name is not valid endpoint for Dojah API");
			}

			$class = new $className();

			return $class;
		}
	}