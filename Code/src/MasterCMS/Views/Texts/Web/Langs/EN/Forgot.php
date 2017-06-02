<?php

	namespace MasterCMS\Views\Texts\Web\Langs\EN;

	use MasterCMS\Config\Config;	

	class Forgot {

		public $texts = array(
			'cont' => [
				'error_start' => '<div class="alert alert-dismissible alert-danger"><button type="button" class="close" data-dismiss="alert">×</button><strong>Opps!</strong> ', 
				'error_end' => '</div>', 

				'success_start' => '<div class="alert alert-dismissible alert-success"><button type="button" class="close" data-dismiss="alert">×</button><strong>Success!</strong> ', 
				'success_end' => '</div>', 
			],

			'texts' => [
				'empty' => 'Do not leave blanks',
				'incorrect_data' => 'Your email is not registered in the database',
				'invalid_format' => 'Invalid email format',
				'short_or_large_password' => 'The key must contain from 4 to 30 letters',
				'passwords_not_same' => 'The passwords do not match',
				'cant_be_same' => 'The password can not be the previous one',
				// Back To Text
				'mail_title' => 'have you forgotten your password?',
				'sended' => 'An email has already been sent to you, wait 24 hours for the last one to expire',
				'database' => 'An error has occurred in the database',
				'mail_error' => 'An error occurred while sending mail',
				'not_numbers_on_pass' => 'The password must contain numbers and letters',
				'facebook' => 'This account belongs to a facebook, you must recover it from your facebook account',
				'success' => 'Your recovery email has been sent, if you do not find it check in the spam part (SPAM)',
				'success_val' => 'Your password has been successfully modified, wait a moment'
			]
		);
	}

?>