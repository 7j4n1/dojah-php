<?php
	
	/**
	* Dojah Autoloader
	* For use when library is being used without composer
	*/
	
	$dojah_autoloader = function ($class_name) {
		if (strpos($class_name, 'DojahCore')===0) {
			$file = dirname(__FILE__) . DIRECTORY_SEPARATOR;
			$file .= str_replace([ 'DojahCore\\', '\\' ], ['', DIRECTORY_SEPARATOR ], $class_name) . '.php';
			include_once $file;
		}
	};
	
	spl_autoload_register($dojah_autoloader);
	
	return $dojah_autoloader;