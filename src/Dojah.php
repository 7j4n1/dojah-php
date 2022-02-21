<?php

	namespace DojahCore;

	use \DojahCore\Dojah\Routes;

	class Dojah {

		public function __constructor(){

			
		}

		public function __call($name)
		{
			$className = __NAMESPACE__ . '\\Dojah\\Routes\\' . ucfirst($name);

			if (!class_exists($className)) {
				throw new \InvalidArgumentException("$name is not valid endpoint for Dojah API");
			}

			$class = new $className()

			return $class;
		}
	}