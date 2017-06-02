<?php

	namespace MasterCMS\Views\Texts\Web\Langs\EN;

	use MasterCMS\Config\Config;	

	class Register {

		public $texts = array(
			'cont' => [
				'error_start' => '<div class="alert alert-dismissible alert-danger"><button type="button" class="close" data-dismiss="alert">×</button><strong>Opps!</strong> ', 
				'error_end' => '</div>', 

				'success_start' => '<div class="alert alert-dismissible alert-success"><button type="button" class="close" data-dismiss="alert">×</button><strong>Success!</strong> ', 
				'success_end' => '</div>', 
			],

			'texts' => [
				'empty' => 'Do not leave blanks',
				'invalid_name' => 'Invalid username',
				'short_or_large_name' => 'The username must contain 4 to 15 letters',
				'short_or_large_password' => 'The key must contain from 4 to 30 letters',
				'banned_1' => 'You have been banned by: <strong>',
				'banned_2' => '</strong> for the reason: <strong>',
				'banned_3' => '</strong><br> Your ban will expire on: <strong>',
				'banned_4' => '</strong>',
				'unbanned' => 'Your banning time is over, wait a minute',
				'user_exist' => 'This user already exists, use another',
				'mail_exist' => 'This email already exists, use another',
				'mails_not_same' => 'Emails do not match',
				'maintenance' => 'The website is under maintenance, log in at another time!',
				'passwords_not_same' => 'Passwords do not match',
				'invalid_mail' => 'Invalid email',
				'max_accounts' => 'You have exceeded the limit of accounts registered by IP: ',
				'sessioned' => 'Log out to register another account',
				'not_numbers_on_pass' => 'The password must contain numbers and letters',
				'agree_terms' => 'You must accept the terms before continuing',
				'database' => 'An error has occurred in the database',
				'success' => 'You have registered Successfully, wait a moment'
			]
		);
	}

?>