<?php

	namespace MasterCMS\Views\Texts\Web\Langs\EN;

	use MasterCMS\Config\Config;	

	class Refers {

		public $texts = array(
			'cont' => [
				'error_start' => '<div class="alert alert-dismissible alert-danger"><button type="button" class="close" data-dismiss="alert">×</button><strong>Opps!</strong> ', 
				'error_end' => '</div>', 

				'success_start' => '<div class="alert alert-dismissible alert-success"><button type="button" class="close" data-dismiss="alert">×</button><strong>Success!</strong> ', 
				'success_end' => '</div>', 
			],

			'texts' => [
				'no_awards' => 'There are currently no prizes available for referrals',
				'need_refers' => 'You need more referrals to get your prize',
				'reclamed' => 'You be already claimed your prize, now you have to keep moving on to more prizes',
				// Back To Text
				'database' => 'An error has occurred in the database',
				'success_dec' => 'Your prize has been declined, wait a moment',
				'success' => 'Your prize has been claimed, wait a moment'
			]
		);
	}

?>