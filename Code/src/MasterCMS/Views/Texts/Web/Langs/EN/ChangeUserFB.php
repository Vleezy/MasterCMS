<?php

	namespace MasterCMS\Views\Texts\Web\Langs\EN;

	use MasterCMS\Config\Config;	

	class ChangeUserFB {

		public $texts = array(
			'cont' => [
				'error_start' => '<div class="alert alert-dismissible alert-danger"><button type="button" class="close" data-dismiss="alert">×</button><strong>Opps!</strong> ', 
				'error_end' => '</div>', 

				'success_start' => '<div class="alert alert-dismissible alert-success"><button type="button" class="close" data-dismiss="alert">×</button><strong>Success!</strong> ', 
				'success_end' => '</div>', 
			],

			'texts' => [
				'empty' => 'Do not leave blanks',
				'incorrect_data' => 'The username is already in use, use another',
				'facebook_account' => 'This account belongs to a facebook account, can not be used by manual login',
				'sessioned' => 'Sign out to sign in to another account',
				'database' => 'An error has occurred in the database',
				'short_or_large_name' => 'The username must contain 4 to 15 letters',
				'invalid_name' => 'Invalid username',
				'completed' => ' Previously renamed',
				'no_facebook' => 'This account is not associated with a facebook',
				'success' => 'You have changed your username, wait a moment'
			]
		);
	}

?>