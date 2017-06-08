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
   
	namespace MasterCMS\Controllers;

	use MasterCMS\Config\{Config, Connection, Request};
	use MasterCMS\Models\{Template, Protection, Sessions, Users, Mails, Redirections, Hotel};

	class formsController {

		private $con;
		private $template;
		private $config;
		private $protection;
		private $users;
		private $mails;
		private $sessions;
		private $redirections;
		private $hotel;
		private $url;
		private $error_start;
		private $error_end;
		private $success_start;
		private $success_end;

		public function __construct()
		{
			$this->con = new Connection();
			$this->template = new Template;
			$this->config = new Config;
			$this->protection = new Protection;
			$this->sessions = new Sessions;
			$this->users = new Users;
			$this->mails = new Mails;
			$this->redirections = new Redirections;
			$this->hotel = new Hotel;
			$this->template->setEverything();
			$this->url = $this->template->vars['url'];
			$template_name = $this->hotel->getConfig('template_name');
			// Obtain the langs
			$textsNames = [];
			$mainClass = "MasterCMS\\Views\\Texts\\Web\\Langs\\{$this->config->select['WEB']['LANG']}\\Main";
			$this->main = new $mainClass;
			foreach ($this->main->texts['forms'] as $key => $value) {
				array_push($textsNames, $key);
			}
			foreach ($textsNames as $key) {
				$this->$key = $this->main->texts['forms'][$key];
			}
			// Default containers 
			$this->error_start = $this->main->format['error_start'];
			$this->error_end = $this->main->format['error_end'];
			$this->success_start = $this->main->format['success_start'];
			$this->success_end = $this->main->format['success_end'];
			// Change containers to the theme container
			$class = "MasterCMS\\Views\\WebViews\\{$template_name}\\Langs\\{$this->config->select['WEB']['LANG']}\\Texts\\Main";
			$classRute = ROOT . 'src' . DS . 'MasterCMS' . DS . 'Views' . DS . 'WebViews' . DS . $template_name . DS . 'Langs' . DS . $this->config->select['WEB']['LANG'] . DS . 'Texts' . DS;
			if (file_exists($classRute . 'Main' . '.php')) {
				if (class_exists($class)) {
					$class = new $class;
					$cont = $class->format;
					foreach ($cont as $key2 => $value) {
						if ($key2 == 'error_start') {
							$this->error_start = $class->format['error_start'];
						}

						if ($key2 == 'error_end') {
							$this->error_end = $class->format['error_end'];
						}

						if ($key2 == 'success_start') {
							$this->success_start = $class->format['success_start'];
						}

						if ($key2 == 'success_end') {
							$this->success_end = $class->format['success_end'];
						}
					}

					foreach ($class->texts['forms'] as $key => $value) {
						if (!in_array($value['name'], $textsNames)) {
							array_push($textsNames, $value['name']);
							foreach ($value['values'] as $key2 => $value2) {
								$this->$key[$key2] = $class->texts['forms'][$key]['values'][$key2];
							}
						}
					}

					foreach ($textsNames as $key) {
						$lang = $class->texts['forms'];
						if ($key == $lang[$key]['name']) {
							foreach ($this->main->texts['forms'][$key] as $key2 => $value) {
								foreach ($class->texts['forms'][$key]['values'] as $key3 => $value) {
									if ($key3 == $key2) {
										$this->$key[$key2] = $class->texts['forms'][$key]['values'][$key3];
									}

									if (empty($key2)) {
										$this->$key[$key3] = $class->texts['forms'][$key]['values'][$key3];
									}
								}
							}
						} else {
							$this->$key = $this->main->texts['forms'][$key];
						}
					}
				} 
			}

			$class = "MasterCMS\\Views\\WebViews\\{$template_name}\\Langs\\{$this->config->select['WEB']['LANG']}\\Texts\\Main";
			$this->main = new $class;
		}

		public function index()
		{
			echo "You are not allowed to access here";
		}

		// Login validation
		public function login()
		{
			if (!$this->users->getSession()) {
				// Variables
				$username = $this->protection->filter($_POST['username']);
			    $password = $this->protection->filter($_POST['password']);
			    $remember = $this->protection->filter($_POST['remember']);
				$queryUser = $this->con->query("SELECT * FROM users WHERE username = '{$username}' AND password = '{$this->protection->encriptPassword($password)}'");
				$queryUsername = $this->con->num_rows("SELECT * FROM users WHERE username = '{$username}'");
				$selectUser = $this->con->fetch_assoc($getUser);
				$queryFb = $this->con->query("SELECT * FROM users WHERE username = '{$username}' AND facebook_account = '1'");
				$queryBan = $this->con->query("SELECT * FROM bans WHERE value = '{$this->users->getIP()}' OR value = '{$username}' ORDER BY id DESC LIMIT 1");
				$selectBan = $this->con->fetch_assoc($queryBan);

				// Validation
				if (empty($username) || empty($password)) {
					echo $this->error_start . $this->login['empty'] . $this->error_end;
				} elseif ($queryUsername >= 2) {
					echo $this->error_start . $this->login['account_has_2'] . $this->error_end;
				} elseif (!$this->con->num_rows($queryUser)) {
					echo $this->error_start . $this->login['incorrect_data'] . $this->error_end;
				} elseif ($this->con->num_rows($queryBan)) {					
					if ($selectBan['expire'] <= time()) {
						$this->con->query("DELETE FROM bans WHERE value = '{$selectBan['value']}'");

						if (!$this->users->getSession()) {
							if ($this->hotel->getConfig('maintenance') && !in_array($selectUser['rank'], $this->hotel->getMaster('all'))) {
								echo $this->error_start . $this->login['maintenance'] . $this->error_end;
							} else {
								$password = $this->protection->encriptPassword($password);
								$time = time();
								if (!$remember) {
									$this->sessions->set('session', 'username', $username);
									$this->sessions->set('session', 'password', $password);
									$set = $this->users->set('last_used', time());
									$set .= $this->users->set('ip_last', $this->users->getIP());
								} else {
									$this->sessions->set('cookie', 'username', $username);
									$this->sessions->set('cookie', 'password', $password);
									$set = $this->con->query("UPDATE users SET last_used = '{$time}', ip_last = '{$this->users->getIP()}' WHERE username = '{$username}'");
								}

								echo $this->success_start . $this->login['success'] . $this->success_end . $this->redirections->js($this->url, 3000);
								if (!$set) {
									echo $this->error_start . $this->login['database'] . $this->error_end;
								}

								$this->sessions->delete('session', 'refer');
								$this->sessions->delete('session', 'refer_ip');
								$this->sessions->delete('session', 'referer_id');
							}

						} else {
							echo $this->error_start . $this->login['sessioned'] . $this->error_end;
						}
					} else {
						$data = $this->login['banned'];
						$data = str_replace('{@ban_expire_date}', date('d/m/Y - H:i:s', $selectBan['expire']), $data);
						foreach ($selectBan as $key => $value) {
							$data = str_replace('{@ban_' . $key . '}', $value, $data);
						}
						echo $this->error_start . $data . $this->error_end;
					}
				} elseif ($this->con->num_rows($queryFb) > 0) {
					echo $this->error_start . $this->login['facebook_account'] . $this->error_end;
				} else {
					if (!$this->users->getSession()) {
						if ($this->hotel->getConfig('maintenance') && !in_array($selectUser['rank'], $this->hotel->getMaster('all'))) {
							echo $this->error_start . $this->login['maintenance'] . $this->error_end;
						} else {
							$password = $this->protection->encriptPassword($password);
							$time = time();
							if (!$remember) {
								$this->sessions->set('session', 'username', $username);
								$this->sessions->set('session', 'password', $password);
								$set = $this->users->set('last_used', time());
								$set .= $this->users->set('ip_last', $this->users->getIP());
							} else {
								$this->sessions->set('cookie', 'username', $username);
								$this->sessions->set('cookie', 'password', $password);
								$set = $this->con->query("UPDATE users SET last_used = '{$time}', ip_last = '{$this->users->getIP()}' WHERE username = '{$username}'");
							}

							if (!$set) {
								echo $this->error_start . $this->login['database'] . $this->error_end;
							} else {
								echo $this->success_start . $this->login['success'] . $this->success_end . $this->redirections->js($this->url, 3000);
							}

							$this->sessions->delete('session', 'refer');
							$this->sessions->delete('session', 'refer_ip');
							$this->sessions->delete('session', 'referer_id');
						}

					} else {
						echo $this->error_start . $this->login['sessioned'] . $this->error_end;
					}
				}
			}
		}

		public function register()
		{
			if (!$this->users->getSession()) {
				$username = $this->protection->filter($_POST['username']);
			    $password = $this->protection->filter($_POST['password']);
			    $rpassword = $this->protection->filter($_POST['rpassword']);
			    $mail = $this->protection->filter($_POST['mail']);
			    $rmail = $this->protection->filter($_POST['rmail']);
			    $gender = $this->protection->filter($_POST['gender']);
			    $look = $this->protection->filter($_POST['look']);
			    $terms = $this->protection->filter($_POST['terms']);
			    $motto = $this->config->select['USER_REGISTER']['MOTTO'];
			    $credits = $this->config->select['USER_REGISTER']['CREDITS'];
			    $duckets = $this->config->select['USER_REGISTER']['DUCKETS'];
			    $diamonds = $this->config->select['USER_REGISTER']['DIAMONDS'];
			    $gotw = $this->config->select['USER_REGISTER']['GOTW'];
			    $home_room = $this->config->select['USER_REGISTER']['HOME_ROOM'];
			    $ip_reg = $this->users->getIP();
			    $getUserIP = $this->con->query("SELECT * FROM users WHERE ip_reg = '{$ip_reg}' OR ip_last = '{$ip_reg}'");
			    $getUser = $this->con->query("SELECT * FROM users WHERE username = '{$username}'");
			    $getMail = $this->con->query("SELECT * FROM users WHERE mail = '{$mail}'");
			    $queryBan = $this->con->query("SELECT * FROM bans WHERE value = '{$this->users->getIP()}' LIMIT 1");
			    $selectBan = $this->con->fetch_assoc($queryBan);
				$filter = preg_replace("/[^a-z\d\-=\?!@:\.]/i", "", $username);
				$pass1 = strpos($password, 1);
				
				if (!$look) {
					if ($gender == 'M') {
						$look = 'hd-180-2.hr-3163-42.he-3070-62.ch-3030-1330.cp-3315-1427.lg-3058-110.sh-3016-100.wa-2001-70';
					} else {
						$look = 'hd-3096-1.hr-3012-31.ch-665-92.cc-3066-1324.lg-3006-63.sh-3016-1408';
					}
				}

				// Form
				if (empty($username) || empty($password) || empty($mail) || empty($rmail) || empty($rpassword) || empty($gender)) {
			        echo $this->error_start . $this->register['empty'] . $this->error_end;
			    } elseif ($username !== $filter || strrpos($username, "MOD-") !== false || strrpos($username, "-MOD") !== false) {
			    	echo $this->error_start . $this->register['invalid_name'] . $this->error_end;
			    } elseif (strlen($username) < 4 || strlen($username) > 15) {
			        echo $this->error_start . $this->register['short_or_large_name'] . $this->error_end;
			    } elseif (strlen($password) > 30 || strlen($password) < 4) {
			        echo $this->error_start . $this->register['short_or_large_password'] . $this->error_end;
			    } elseif($this->con->num_rows($getUser) > 0) {
			        echo $this->error_start . $this->register['user_exist'] . $this->error_end;
			    } elseif($this->con->num_rows($getMail) > 0) {
			        echo $this->error_start . $this->register['mail_exist'] . $this->error_end;
			    } elseif ($mail != $rmail) {
			        echo $this->error_start . $this->register['mails_not_same'] . $this->error_end;
			    } elseif ($password != $rpassword) {
			        echo $this->error_start . $this->register['passwords_not_same'] . $this->error_end;
			    } elseif (!preg_match("`[0-9]`", $password) || !preg_match("`[a-z]`", $password)) {
			    	echo $this->error_start . $this->register['not_numbers_on_pass'] . $this->error_end;
			    } elseif (!$this->users->validateMail($mail)) {
			        echo $this->error_start . $this->register['invalid_mail'] . $this->error_end;
			    } elseif (!$terms) {
			    	echo $this->error_start . $this->register['agree_terms'] . $this->error_end;
			    } elseif ($this->con->num_rows($getUserIP) >= $this->config->select['USER_REGISTER']['MAX_ACCOUNTS']) {
			        $data = $this->register['max_accounts'];
			        $data = str_replace('{@max_accounts}', $this->config->select['USER_REGISTER']['MAX_ACCOUNTS'], $data);
			        $data = str_replace('{@your_accounts}', $this->con->num_rows($getUserIP), $data);
			        echo $this->error_start . $data . $this->error_end;
			    } elseif($this->con->num_rows($queryBan)) {
			        if ($selectBan['expire'] <= time()) {
						$this->con->query("DELETE FROM bans WHERE value = '{$cb['value']}'");
				    	if (!$this->users->getSession()) {
				    		$password = $this->protection->encriptPassword($password);
							$add = $this->users->add($username, $password, $mail, $gender, $motto, $look, $credits, $duckets, $diamonds, $ip_reg);
					    	if ($add) {
					    		echo $this->success_start . $this->register['success'] . $this->success_end . $this->redirections->js($this->url, 3000);

								if ($this->sessions->get('session', 'refer')) {
									$this->users->addRefer($username, $this->sessions->get('session', 'referer_id'), $this->sessions->get('session', 'refer_ip'));
								}
								$this->sessions->delete('session', 'refer');
								$this->sessions->delete('session', 'refer_ip');
								$this->sessions->delete('session', 'referer_id');
								$this->sessions->set('session', 'username', $username);
								$this->sessions->set('session', 'password', $password);
								$queryUser = $this->con->query("SELECT * FROM users WHERE username = '{$username}' AND password = '{$password}'");
								$selectUser = $this->con->fetch_assoc($queryUser);
								foreach ($selectUser as $key => $value) {
									$this->mails->setParam('user_' . $key, $value);
								}
								$this->mails->send('PRINCIPAL', $this->main->texts['mails']['account_created'], 'AccountCreated.html', $this->mails->vars['user_mail']);
					    	} else {
					    		echo $this->error_start . $this->register['database'] . $this->error_end;
					    	}
						}
					} else {
						$data = $this->register['banned'];
						$data = str_replace('{@ban_expire_date}', date('d/m/Y - H:i:s', $selectBan['expire']), $data);
						foreach ($selectBan as $key => $value) {
							$data = str_replace('{@ban_' . $key . '}', $value, $data);
						}
						echo $this->error_start . $data . $this->error_end;
					}
			    } else {
			    	if (!$this->users->getSession()) {
				    	if (!$this->hotel->getConfig('maintenance')) {
				    		$password = $this->protection->encriptPassword($password);
							$add = $this->users->add($username, $password, $mail, $gender, $motto, $look, $credits, $duckets, $diamonds, $ip_reg, $home_room);
					    	if ($add) {
					    		echo $this->success_start . $this->register['success'] . $this->success_end . $this->redirections->js($this->url, 3000);
					    		if ($this->sessions->get('session', 'refer')) {
									$this->users->addRefer($username, $this->sessions->get('session', 'referer_id'), $this->sessions->get('session', 'refer_ip'));
								}
								$this->sessions->delete('session', 'refer');
								$this->sessions->delete('session', 'refer_ip');
								$this->sessions->delete('session', 'referer_id');
								$this->sessions->set('session', 'username', $username);
								$this->sessions->set('session', 'password', $password);
								$queryUser = $this->con->query("SELECT * FROM users WHERE username = '{$username}' AND password = '{$password}'");
								$selectUser = $this->con->fetch_assoc($queryUser);
								foreach ($selectUser as $key => $value) {
									$this->mails->setParam('user_' . $key, $value);
								}
								$this->mails->send('PRINCIPAL', $this->main->texts['mails']['account_created'], 'AccountCreated.html', $this->mails->vars['user_mail']);
					    	} else {
					    		echo $this->error_start . $this->register['database'] . $this->error_end;
					    	}
				    	} else {
				    		echo $this->error_start . $this->register['maintenance'] . $this->error_end;
				    	}
					}
			    }
			} else {
				echo $this->error_start . $this->register['sessioned'] . $this->error_end;
			}
		}

		public function forgot()
		{
			if (!$this->users->getSession()) {
				$mail = $this->protection->filter($_POST['mail']);
				$user = $this->con->query("SELECT * FROM users WHERE mail = '{$mail}' LIMIT 1");
				$user_select = $this->con->fetch_assoc($user);
				$select = $this->con->query("SELECT * FROM user_forgot_code WHERE user_id = '{$user_select['id']}' ORDER BY id DESC");
				$show = $this->con->fetch_assoc($select);
				if (empty($mail)) {
					echo $this->error_start . $this->forgot['empty'] . $this->error_end;
				} else if (!$this->users->validateMail($mail)) {
					echo $this->error_start . $this->forgot['invalid_format'] . $this->error_end;
				} else if (!$this->con->num_rows($user)) {
					echo $this->error_start . $this->forgot['incorrect_data'] . $this->error_end;
				} else {
					if (!$this->con->num_rows($select)) {
						if ($user_select['facebook_account']) {
							echo $this->error_start . $this->forgot['facebook'] . $this->error_end;
						} else {
							$this->mails->setParam('username', $user_select['username']);
							$token = $this->mails->generateToken();
							$this->mails->setParam('token', $token);
							$hours = time() + (1 * 24 * 60 * 60);
							$time = time();
							foreach ($user_select as $key => $value) {
								$this->mails->setParam('user_' . $key, $value);
							}
							$sended = $this->mails->send('PRINCIPAL', $this->forgot['mail_title'], 'Forgot.html', $mail);
							if ($sended) {
								$query = $this->con->query("INSERT INTO user_forgot_code (user_id, code, expire, timestamp) VALUES ('{$user_select['id']}', '{$token}', '{$hours}', '{$time}')");
								if ($query) {
									echo $this->success_start . $this->forgot['success'] . $this->success_end;
								} else {
									echo $this->error_start . $this->forgot['database'] . $this->error_end;
								}
							} else {
								echo $this->error_start . $this->forgot['mail_error'] . $this->error_end;
							}
						}
					} else {
						if ($show['expire'] <= time()) {
							if ($user_select['facebook_account']) {
								echo $this->error_start . $this->forgot['facebook'] . $this->error_end;
							} else {
								$this->mails->setParam('username', $user_select['username']);
								$token = $this->mails->generateToken();
								$this->mails->setParam('token', $token);
								$hours = time() + (1 * 24 * 60 * 60);
								foreach ($user_select as $key => $value) {
									$this->mails->setParam('user_' . $key, $value);
								}
								$sended = $this->mails->send('PRINCIPAL', $this->forgot['mail_title'], 'Forgot.html', $mail);
								if ($sended) {
									$query = $this->con->query("INSERT INTO user_forgot_code (user_id, code, expire) VALUES ('{$user_select['id']}', '{$token}', '{$hours}')");
									if ($query) {
										echo $this->success_start . $this->forgot['success'] . $this->success_end;
									} else {
										echo $this->error_start . $this->forgot['database'] . $this->error_end;
									}
								} else {
									echo $this->error_start . $this->forgot['mail_error'] . $this->error_end;
								}
							}
						} else {
							echo $this->error_start . $this->forgot['sended'] . $this->error_end;
						}
					}
				}
			} else {
				echo $this->error_start . $this->forgot['sessioned'] . $this->error_end;
			}
		}

		public function forgot_validation()
		{
			if (!$this->users->getSession()) {
				$password = $this->protection->filter($_POST['password']);
				$rpassword = $this->protection->filter($_POST['rpassword']);
				$code = $this->con->query("SELECT * FROM user_forgot_code WHERE code = '{$this->sessions->get('session', 'forgot_code')}'");
				$select_code = $this->con->fetch_assoc($code);
				$user = $this->con->query("SELECT * FROM users WHERE id = '{$select_code['user_id']}' LIMIT 1");
				$user_select = $this->con->fetch_assoc($user);
				if (empty($password) || empty($rpassword)) {
					echo $this->error_start . $this->forgot['empty'] . $this->error_end;
				} else if (strlen($password) > 30 || strlen($password) < 4) {
					echo $this->error_start . $this->forgot['short_or_large_password'] . $this->error_end;
				} else if ($password != $rpassword) {
					echo $this->error_start . $this->forgot['passwords_not_same'] . $this->error_end;
				} elseif (!preg_match("`[0-9]`", $password)) {
			    	echo $this->error_start . $this->forgot['not_numbers_on_pass'] . $this->error_end;
			    } else if ($this->protection->encriptPassword($password) == $user_select['password']) {
					echo $this->error_start . $this->forgot['cant_be_same'] . $this->error_end;
				} else {
					$update = $this->users->set('password', $this->protection->encriptPassword($password), $user_select['username']);
					$update .= $this->con->query("UPDATE user_forgot_code SET expire = '0' WHERE user_id = '{$user_select['id']}'");
					if ($update) {
						echo $this->success_start . $this->forgot['success_val'] . $this->success_end . $this->redirections->js($this->url, 3000);
						$this->sessions->delete('session', 'forgot_code');
					} else {
						echo $this->error_start . $this->forgot['database'] . $this->error_end;
					}
				}
			} else {
				echo $this->error_start . $this->forgot['sessioned'] . $this->error_end;
			}
		}

		public function fbusername()
		{
			if ($this->users->getSession()) {
				$username = $this->protection->filter($_POST['username']);
				$query = $this->con->query("SELECT * FROM users WHERE username = '{$username}'");
				$filter = preg_replace("/[^a-z\d\-=\?!@:\.]/i", "", $username);
				if ($this->users->get('facebook_account')) {
					if ($this->users->get('facebook_completed') == 0 && $this->users->get('facebook_account') == 1) {
						if (empty($username)) {
							echo $this->error_start . $this->fbusername['empty'] . $this->error_end;
						} elseif (strlen($username) < 4 || strlen($username) > 15) {
					        echo $this->fbusername['short_or_large_name'];
					    } elseif ($username !== $filter || strrpos($username, "MOD-") !== false || strrpos($username, "-MOD") !== false) {
							echo $this->error_start . $this->fbusername['invalid_name'] . $this->error_end;
						} else if ($this->con->num_rows($query) > 0) {
							echo $this->error_start . $this->fbusername['incorrect_data'] . $this->error_end;
						} else {
							$update = $this->users->set('username', $username);
							$update .= $this->users->set('facebook_completed', 1);
							if ($update) {
								echo $this->success_start . $this->fbusername['success'] . $this->success_end . $this->redirections->js($this->url, 3000);
							} else {
								echo $this->error_start . $this->fbusername['database'] . $this->error_end . $this->redirections->js($this->url, 3000);
							}
						}
					} else {
						echo $this->error_start . $this->fbusername['completed'] . $this->error_end;
					}
				} else {
					echo $this->error_start . $this->fbusername['no_facebook'] . $this->error_end;
				}
			} else {
				echo $this->error_start . $this->fbusername['unsessioned'] . $this->error_end;
			}
		}

		public function settings($add = false)
		{
			if ($this->users->getSession()) {
				if ($add == 'general') {
					$chat_color = $this->protection->filter($_POST['chat_color']);
					$colors = array(0, 'blue', 'red', 'green', 'cyan', 'purple');
					$allowtr = $this->protection->filter($_POST['allowtr']);
					$allowfr = $this->protection->filter($_POST['allowfr']);
					$allowpr = $this->protection->filter($_POST['allowpr']);
					$oldchat = $this->protection->filter($_POST['oldchat']);
					$invitations = $this->protection->filter($_POST['invitations']);
					$focus = $this->protection->filter($_POST['focus']);
					$error_start = $this->error_start;
					$error_end = $this->error_end;
					if (!in_array($chat_color, $colors)) {
						$error = $this->settings['invalid_color'];
					} else if ($allowfr != 0 && $allowfr != 1 || $allowtr != 0 && $allowtr != 1 || $allowpr != 0 && $allowpr != 1 || $oldchat != 0 && $oldchat != 1 || $invitations != 0 && $invitations != 1) {
						$error = $this->settings['dont_try_inyect'];
					} else {
						$edit = $this->users->set('chat_color', "@{$chat_color}@");
						$edit .= $this->users->set('block_newfriends', $allowfr);
						$edit .= $this->users->set('block_trade', $allowtr);
						$edit .= $this->users->set('block_view_profile', $allowpr);
						$edit .= $this->users->set('prefer_old_chat', $oldchat);
						$edit .= $this->users->set('ignoreRoomInvitations', $invitations);
						$edit .= $this->users->set('dontfocususers', $focus);
						/*
						$this->hotel->sendMUS("updatechatsettings;{$this->users->get('id')}");
						$this->hotel->sendMUS("updatepetitionsdisable;{$this->users->get('id')};{$allowfr}");
						$this->hotel->sendMUS("updatetradesdisable;{$this->users->get('id')};{$allowtr}");
						$this->hotel->sendMUS("updateignoreroominvitations;{$this->users->get('id')};{$invitations}");
						$this->hotel->sendMUS("updatedontfocususers;{$this->users->get('id')};{$focus}");
						$this->hotel->sendMUS("updateprefoldchat;{$this->users->get('id')};{$oldchat}");
						*/
						if ($edit) {
							$error_start = $this->success_start;
							$error = $this->settings['success'];
							$error_end = $this->success_end;
						} else {
							$error = $this->settings['database'];
						}
					}
					echo $error_start . $error . $error_end;
				} else if ($add == 'password') {
					$error_start = $this->error_start;
					$error_end = $this->error_end;
					if (!$this->users->get('facebook_account')) {
						$oldpassword = $this->protection->filter($_POST['oldpassword']);
						$newpassword = $this->protection->filter($_POST['newpassword']);
						$rnewpassword = $this->protection->filter($_POST['rnewpassword']);
						if (empty($oldpassword) || empty($newpassword) || empty($rnewpassword)) {
							$error = $this->settings['empty'];
						} else if ($this->protection->encriptPassword($oldpassword) != $this->users->get('password')) {
							$error = $this->settings['not_same'];
						} else if ($newpassword != $rnewpassword) {
							$error = $this->settings['not_same_new'];
						} elseif (strlen($newpassword) < 4 || strlen($newpassword) > 30) {
							$error = $this->settings['short_or_large_password'];
						} elseif (!preg_match("`[0-9]`", $newpassword) || !preg_match("`[a-z]`", $newpassword)) {
					    	$error = $this->settings['not_numbers_on_pass'];
					    } elseif ($this->protection->encriptPassword($newpassword) == $this->users->get('password')) {
							$error = $this->settings['cant_be_old_pass'];
						} else {
							$queryUser = $this->con->query("SELECT * FROM users WHERE id = '{$this->users->get('id')}'");
							$selectUser = $this->con->fetch_assoc($queryUser);
							foreach ($selectUser as $key => $value) {
								$this->mails->setParam('user_' . $key, $value);
							}
							if ($this->mails->vars['user_facebook_account']) {
								$this->mails->setParam('user_mail', str_replace('.facebook', '', $this->mails->vars['user_mail']));
							}
							$this->mails->send('PRINCIPAL', 'Password Changed', 'PasswordChanged.html', $this->users->get('mail'));
							$set = $this->users->set('password', $this->protection->encriptPassword($newpassword));
							if ($set) {
								$error_start = $this->success_start;
								$error = $this->settings['success_pass'];
								$error .= $this->redirections->js($this->url . '/hk', 3000);
								$error_end = $this->success_end;
								$this->sessions->delete('session', '*');
								$this->sessions->delete('cookie', 'username');
								$this->sessions->delete('cookie', 'password');
							} else {
								$error = $this->settings['database'];
							}
						}
					} else {
						$error = $this->settings['facebook_account'];
					}
					echo $error_start . $error . $error_end;
				} else if ($add == 'mail') {
					$error_start = $this->error_start;
					$error_end = $this->error_end;
					if (!$this->users->get('facebook_account')) {
						$oldmail = $this->protection->filter($_POST['oldmail']);
						$newmail = $this->protection->filter($_POST['newmail']);
						$rnewmail = $this->protection->filter($_POST['rnewmail']);
						$queryMails = $this->con->query("SELECT * FROM users WHERE mail = '{$newmail}'");
						if (empty($oldmail) || empty($newmail) || empty($rnewmail)) {
							$error = $this->settings['empty'];
						} elseif (!$this->users->validateMail($newmail)) {
							$error = $this->settings['invalid_mail'];
						} else if ($oldmail != $this->users->get('mail')) {
							$error = $this->settings['not_same_mail'];
						} else if ($newmail != $rnewmail) {
							$error = $this->settings['not_same_new_mail'];
						} else if ($newmail == $this->users->get('mail')) {
							$error = $this->settings['cant_be_old_mail'];
						} else if ($this->con->num_rows($queryMails) > 0) {
							$error = $this->settings['mail_used'];
						} else {
							$query = $this->con->query("SELECT * FROM user_verification_code WHERE user_id = '{$this->users->get('id')}' ORDER BY id DESC");
							$hours = time() + (1 * 24 * 60 * 60);
							$time = time();
							if ($this->con->num_rows($query) > 0) {
								$select = $this->con->fetch_assoc($query);
								if ($select['expire'] <= $time) {
									// Send Mail
									$token = $this->mails->generateToken();
									$this->mails->setParam('token', $token);
									$this->mails->setParam('username', $this->users->get('username'));
									$this->mails->setParam('old_mail', $this->users->get('mail'));
									$this->mails->setParam('new_mail', $newmail);
									$queryUser = $this->con->query("SELECT * FROM users WHERE id = '{$this->users->get('id')}'");
									$selectUser = $this->con->fetch_assoc($queryUser);
									foreach ($selectUser as $key => $value) {
										$this->mails->setParam('user_' . $key, $value);
									}
									$send = $this->mails->send('PRINCIPAL', $this->settings['mail_title'], 'Verification.html', $newmail);
									if ($send) {
										$error_start = $this->success_start;
										$time = time();
										$add = $this->con->query("INSERT INTO user_verification_code (user_id, code, expire, new_mail, timestamp) VALUES ('{$this->users->get('id')}', '{$token}', '{$hours}', '{$newmail}', {$time})");
										if ($add) {
											$error_start = $this->success_start;
											$error = $this->settings['success_mail'];
											$error_end = $this->success_end;
										} else {
											$error = $this->settings['database'];
										}
										$error_end = $this->success_end;
									} else {
										$error = $this->settings['mail_error'];
									}
								} else {
									$error = $this->settings['mail_sended'];
								}
							} else {
								// Send Mail
								$token = $this->mails->generateToken();
								$this->mails->setParam('token', $token);
								$this->mails->setParam('username', $this->users->get('username'));
								$this->mails->setParam('old_mail', $this->users->get('mail'));
								$this->mails->setParam('new_mail', $newmail);
								$queryUser = $this->con->query("SELECT * FROM users WHERE id = '{$this->users->get('id')}'");
								$selectUser = $this->con->fetch_assoc($queryUser);
								foreach ($selectUser as $key => $value) {
									$this->mails->setParam('user_' . $key, $value);
								}
								$send = $this->mails->send('PRINCIPAL', $this->settings['mail_title'], 'Verification.html', $newmail);
								if ($send) {
									$time = time();
									$add = $this->con->query("INSERT INTO user_verification_code (user_id, code, expire, new_mail, timestamp) VALUES ('{$this->users->get('id')}', '{$token}', '{$hours}', '{$newmail}', {$time})");
									if ($add) {
										$error_start = $this->success_start;
										$error = $this->settings['success_mail'];
										$error_end = $this->success_end;
									} else {
										$error = $this->settings['database'];
									}
								} else {
									$error = $this->settings['mail_error'];
								}
							}
						}
					} else {
						$error = $this->settings['facebook_account'];
					}
					echo $error_start . $error . $error_end;
				} else if ($add == 'delete') {
					$error_start = $this->error_start;
					$error_end = $this->error_end;
					$accept = $this->protection->filter($_POST['accept']);
					if (!$accept) {
						$error = $this->settings['accept'];
					} else {
						$query = $this->con->query("SELECT * FROM user_delete_code WHERE user_id = '{$this->users->get('id')}' ORDER BY id DESC");
						$hours = time() + (1 * 24 * 60 * 60);
						$time = time();
						if ($this->con->num_rows($query) > 0) {
							$select = $this->con->fetch_assoc($query);
							if ($select['expire'] <= $time) {
								// Send Mail
								$token = $this->mails->generateToken();
								$this->mails->setParam('token', $token);
								$this->mails->setParam('username', $this->users->get('username'));
								$queryUser = $this->con->query("SELECT * FROM users WHERE id = '{$this->users->get('id')}'");
							$selectUser = $this->con->fetch_assoc($queryUser);
							foreach ($selectUser as $key => $value) {
								$this->mails->setParam('user_' . $key, $value);
							}
								$send = $this->mails->send('PRINCIPAL', $this->settings['mail_title_del'], 'Delete.html', $this->users->get('mail'));
								if ($send) {
									$time = time();
									$add = $this->con->query("INSERT INTO user_delete_code (user_id, code, expire, timestamp) VALUES ('{$this->users->get('id')}', '{$token}', '{$hours}', {$time})");
									if ($add) {
										$error_start = $this->success_start;
										$error = $this->settings['success_mail_del'];
										$error_end = $this->success_end;
									} else {
										$error = $this->settings['database'];
									}
								} else {
									$error = $this->settings['mail_error'];
								}
							} else {
								$error = $this->settings['mail_sended'];
							}
						} else {
							// Send Mail
							$token = $this->mails->generateToken();
							$this->mails->setParam('token', $token);
							$this->mails->setParam('username', $this->users->get('username'));
							$queryUser = $this->con->query("SELECT * FROM users WHERE id = '{$this->users->get('id')}'");
							$selectUser = $this->con->fetch_assoc($queryUser);
							foreach ($selectUser as $key => $value) {
								$this->mails->setParam('user_' . $key, $value);
							}
							$send = $this->mails->send('PRINCIPAL', $this->settings['mail_title_del'], 'Delete.html', $this->users->get('mail'));
							if ($send) {
								$time = time();
								$add = $this->con->query("INSERT INTO user_delete_code (user_id, code, expire, timestamp) VALUES ('{$this->users->get('id')}', '{$token}', '{$hours}', {$time})");
								if ($add) {
									$error_start = $this->success_start;
									$error = $this->settings['success_mail_del'];
									$error_end = $this->success_end;
								} else {
									$error = $this->settings['database'];
								}
							} else {
								$error = $this->settings['mail_error'];
							}
						}
					}
					echo $error_start . $error . $error_end;
				}
			} else {
				echo $this->error_start . $this->settings['unsessioned'] . $this->error_end;
			}
		}
	}

?>
