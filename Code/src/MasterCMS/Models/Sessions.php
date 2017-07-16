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
   
	namespace MasterCMS\Models;

	use MasterCMS\Config\{Config, Connection};

	class Sessions {

		private $con;

		public function __construct()
		{
			$this->con = new Connection;
		}
		
		public function set($type = 'session', $session, $value, $time = 3600 * 24 * 365, $directory = '/')
		{
			if ($type == 'session') {
				$_SESSION[$session] = $value;
			} elseif ($type == 'cookie') {
				setcookie($session, $value, time() + $time, $directory);
			}
		}

		public function get($type = 'session', $session)
		{
			if ($type == 'session') {
				if ($_SESSION[$session]) {
					return $_SESSION[$session];
				} else {
					return false;
				}
			} else {
				if ($_COOKIE[$session]) {
					return $_COOKIE[$session];
				} else {
					return false;
				}
			}
		}

		public function delete($type = 'session', $session, $directory = '/')
		{
			if ($type == 'session') {
				if ($session == '*') {
					foreach ($_SESSION as $key => $value) {
						unset($_SESSION[$key]);
					}
				} else {
					if ($_SESSION[$session]) {
						unset($_SESSION[$session]);
					} else {
						return false;
					}
				}
			} else {
				if ($session == '*') {
					if (isset($_SERVER['HTTP_COOKIE'])) {
		                $cookies = explode(';', $_SERVER['HTTP_COOKIE']);
		                foreach($cookies as $cookie) {
		                    $parts = explode('=', $cookie);
		                    $name = trim($parts[0]);
		                    setcookie($name, '', time()-1000);
		                    setcookie($name, '', time()-1000, '/');
		                }
		            }
				} else {
					if ($_COOKIE[$session]) {
						setcookie($session, '', time() - 1000, $directory);
					} else {
						return false;
					}
				}
			}
		}
	}

?>