<?php 
    
    /**
     *
     *   MasterCMS
     *
     *   Copyright (c) 2017 MasterCMS
     *
     *   @author <Denzel Code>
     *   -------------------------------------------------------------------------
     *   Licensed under the Apache License, Version 2.0 (the "License");
     *   you may not use this file except in compliance with the License.
     *   You may obtain a copy of the License at
     *
     *       http://www.apache.org/licenses/LICENSE-2.0
     *
     *   Unless required by applicable law or agreed to in writing, software
     *   distributed under the License is distributed on an "AS IS" BASIS,
     *   WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
     *   See the License for the specific language governing permissions and
     *   limitations under the License.
     *   -------------------------------------------------------------------------
    */
   
	// Constants
	error_reporting(0);

	define('DS', DIRECTORY_SEPARATOR);

	define('DIRECTORY', realpath(dirname(__DIR__)) . DS);

	define('MAIN_ROOT', __DIR__ . DS);

	define('URL', $_SERVER['HTTP_HOST']);

	if (!empty($_SERVER['HTTPS']) && ('on' == $_SERVER['HTTPS'])) {
		define('TYPE_HTTP', 'https://');
	} else {
		define('TYPE_HTTP', 'http://');
	}

	date_default_timezone_set('Europe/Madrid');
	
	// Autoloader Require
	try {
		$need = '7.0.0';
		if (version_compare(PHP_VERSION, $need) < 0) {
        	throw new Exception('MasterCMS is not available for <strong>PHP ' . PHP_VERSION . '</strong><br>' . 'Please install PHP greater than <strong>PHP ' . $need . '</strong>');
        } else {
        	$rute = DIRECTORY . 'Code' . DS . 'autoload.php';
			if (is_readable($rute)) {
				require_once $rute;
			} else {
				$rute = MAIN_ROOT . 'Code' . DS . 'autoload.php';
				if (is_readable($rute)) {
					require_once $rute;
				} else {
					throw new Exception("Autoload class was not founded");
				}
			}
        }
	} catch (Exception $e) {
		die($e->getMessage());
	}

	// Run Code
	Autoload::run();
	MasterCMS\Config\Router::run(new MasterCMS\Config\Request());
	
?>
