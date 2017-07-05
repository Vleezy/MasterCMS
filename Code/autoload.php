<?php

	class Autoload {

		public static function run()
		{
			// Constants
			session_name('MasterCMS');
			session_start();
			define('ROOT', __DIR__ . DS);

			// Autoload
			spl_autoload_register(function($class){
				try {
					$rute = ROOT . 'src' . DS . $class . '.php';
					$rute = str_replace('\\', '/', $rute);
					if (!is_readable($rute)) {
						throw new Exception("MasterCMS: Cannot get file <strong>{$rute}</strong>");
					} else {
						require_once $rute;
					}
				} catch (Exception $e) {
					die($e->getMessage());
				}
			});
		}
	}

?>