<?php

	namespace MasterCMS\Views\Texts\Web\Langs\EN;

	use MasterCMS\Config\Config;	

	class Settings {

		public $texts = array(
			'cont' => [
				'error_start' => '<div class="alert alert-dismissible alert-danger"><button type="button" class="close" data-dismiss="alert">×</button><strong>Opps!</strong> ', 
				'error_end' => '</div>', 

				'success_start' => '<div class="alert alert-dismissible alert-success"><button type="button" class="close" data-dismiss="alert">×</button><strong>Success!</strong> ', 
				'success_end' => '</div>', 
			],

			'texts' => [
				// General
				'empty' => 'Do not leave blanks',
				'invalid_color' => 'Invalid Color',
				'dont_try_inyect' => 'Do not try to make an injection',
				'not_same' => 'Your password does not match the old password',
				'not_same_new' => 'New passwords do not match',
				// Password
				'facebook_account' => 'Facebook accounts are not authorized to perform this action',
				'short_or_large_password' => 'The key must contain from 4 to 30 letters',
				'success_pass' => 'Password successfully changed, wait a moment to log in',
				'cant_be_old_pass' => 'The new password can not be the old one',
				'not_numbers_on_pass' => 'The password must contain numbers and letters',
				// Mail
				'success_mail' => 'An email has been sent to your new mail to verify the mail change',
				'cant_be_old_mail' => 'The new mail can not be the old one',
				'invalid_mail' => 'Invalid email',
				'mail_title' => 'Email Verification',
				'not_same_new_mail' => 'Emails do not match',
				'not_same_mail' => 'This is not your old mail',
				'mail_used' => 'This email already in use',
				'mail_error' => 'An error occurred while trying to send the email',
				'mail_sended' => 'An email has already been sent to you, wait 24 hours for the last one to expire',
				// Delete
				'success_mail_del' => 'An email has been sent to your new email to verify account closure',
				'accept' => 'You must accept the consequences of closing your account before continuing',
				'mail_title_del' => 'Do you want to delete your account?',
				// Normal
				'database' => 'An error has occurred in the database',
				'success' => 'Information changed successfully'
			]
		);
	}

?>