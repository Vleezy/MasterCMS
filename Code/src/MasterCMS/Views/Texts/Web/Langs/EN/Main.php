<?php

	namespace MasterCMS\Views\Texts\Web\Langs\EN;

	class Main {

		public $format = [
			'error_start' => '<div class="alert alert-dismissible alert-danger"><button type="button" class="close" data-dismiss="alert">×</button><strong>Opps!</strong> ', 
			'error_end' => '</div>', 

			'success_start' => '<div class="alert alert-dismissible alert-success"><button type="button" class="close" data-dismiss="alert">×</button><strong>Success!</strong> ', 
			'success_end' => '</div>', 
		];

		public $texts = [
			'forms' => [
				'login' => [
					'empty' => 'Do not leave blanks',
					'incorrect_data' => 'Incorrect username or password',
					'facebook_account' => 'This account belongs to a facebook account, can not be used by manual login',
					'banned' => 'You have banned by: {@ban_added_by} by the reason {@ban_reason} expire the date {@ban_expire_date}',
					'unbanned' => 'Your banning time is over, wait a minute',
					'account_has_2' => '2 accounts or more with the same name were registered, contact an administrator to solve this error',
					'sessioned' => 'Please log in to complete this edit, <a href="/web/logout">Click here</a>',
					'maintenance' => 'The website is under maintenance, log in at another time!',
					'unsessioned' => 'Open session to perform this action, <a href="/web">Click here</a>',
					'database' => 'An error has occurred in the database',
					'success' => 'You are logged in, wait a moment'
				],

				'register' => [
					'empty' => 'Do not leave blanks',
					'invalid_name' => 'Invalid username',
					'short_or_large_name' => 'The username must contain 4 to 15 letters',
					'short_or_large_password' => 'The key must contain from 4 to 30 letters',
					'unbanned' => 'Your banning time is over, wait a minute',
					'user_exist' => 'This user already exists, use another',
					'banned' => 'You have banned by: {@ban_added_by} by the reason {@ban_reason} expire the date {@ban_expire_date}',
					'mail_exist' => 'This email already exists, use another',
					'mails_not_same' => 'Emails do not match',
					'maintenance' => 'The website is under maintenance, log in at another time!',
					'passwords_not_same' => 'Passwords do not match',
					'invalid_mail' => 'Invalid email',
					'max_accounts' => 'You have exceeded the limit of accounts registered by IP, you have {@your_accounts} and the limit is {@max_accounts}',
					'sessioned' => 'Log out to register another account',
					'not_numbers_on_pass' => 'The password must contain numbers and letters',
					'agree_terms' => 'You must accept the terms before continuing',
					'database' => 'An error has occurred in the database',
					'success' => 'You have registered Successfully, wait a moment'
				],

				'forgot' => [
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
				],

				'fbusername' => [
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
				],

				'settings' => [
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
				],
			]
		];
	}

?>