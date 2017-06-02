<?php

	namespace MasterCMS\Views\Texts\Web\Langs\EN;

	use MasterCMS\Config\Config;	

	class Photo {

		public $texts = array(
			'cont' => [
				'error_start' => '<div class="alert alert-dismissible alert-danger"><button type="button" class="close" data-dismiss="alert">×</button><strong>Opps!</strong> ', 
				'error_end' => '</div>', 

				'success_start' => '<div class="alert alert-dismissible alert-success"><button type="button" class="close" data-dismiss="alert">×</button><strong>Success!</strong> ', 
				'success_end' => '</div>', 
			],

			'texts' => [
				'empty' => 'Do not leave blanks',
				'exist' => 'This image already exists',
				'invalid_file' => 'Invalid file format',
				'invalid_size' => 'Tama&ntilde;o de archivo invalido',
				'cant' => 'No se pudo subir la imagen',
				'database' => 'Se ha producido un error en la base de datos',
				'success' => 'Imagen subida exitosamente'
			]
		);
	}

?>