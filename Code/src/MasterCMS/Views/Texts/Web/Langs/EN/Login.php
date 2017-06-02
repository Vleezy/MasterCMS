<?php

	namespace MasterCMS\Views\Texts\Web\Langs\EN;

	use MasterCMS\Config\Config;	

	class Login {

		public $texts = array(
			'cont' => [
				'error_start' => '<div class="alert alert-dismissible alert-danger"><button type="button" class="close" data-dismiss="alert">×</button><strong>Opps!</strong> ', 
				'error_end' => '</div>', 

				'success_start' => '<div class="alert alert-dismissible alert-success"><button type="button" class="close" data-dismiss="alert">×</button><strong>Success!</strong> ', 
				'success_end' => '</div>', 
			],

			'texts' => [
				'empty' => 'Do not leave blanks',
				'incorrect_data' => 'Incorrect username or password',
				'facebook_account' => 'This account belongs to a facebook account, can not be used by manual login',
				'banned_1' => 'You have been banned by: <strong>',
				'banned_2' => '</strong> by the reason: <strong>',
				'banned_3' => '</strong><br> Your ban will expire on: <strong>',
				'banned_4' => '</strong>',
				'unbanned' => 'Your banning time is over, wait a minute',
				'account_has_2' => '2 accounts or more with the same name were registered, contact an administrator to solve this error',
				'sessioned' => 'Please log in to complete this edit, <a href="/web/logout">Click here</a>',
				'maintenance' => 'The website is under maintenance, log in at another time!',
				'unsessioned' => 'Open session to perform this action, <a href="/web">Click here</a>',
				'database' => 'An error has occurred in the database',
				'success' => 'You are logged in, wait a moment'
			]
		);
	}

?>