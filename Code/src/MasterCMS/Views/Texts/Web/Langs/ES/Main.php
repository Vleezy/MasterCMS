<?php

	namespace MasterCMS\Views\Texts\Web\Langs\ES;

	class Main {

		public $format = [
			'error_start' => '<div class="alert alert-dismissible alert-danger"><button type="button" class="close" data-dismiss="alert">×</button><strong>Opps!</strong> ', 
			'error_end' => '</div>', 

			'success_start' => '<div class="alert alert-dismissible alert-success"><button type="button" class="close" data-dismiss="alert">×</button><strong>&Eacute;xito!</strong> ', 
			'success_end' => '</div>', 
		];

		public $texts = [
			'forms' => [
				'login' => [
					'empty' => 'No dejes espacios en blanco',
					'incorrect_data' => 'Nombre de usuario o contrase&ntilde;a incorrecta',
					'facebook_account' => 'Esta cuenta pertenece a una cuenta de facebook, no puede ser utilizada por logueo manual',
					'banned' => 'Has sido baneado por: {@ban_added_by} por la razon de {@ban_reason} hasta la fecha {@ban_expire_date}',
					'unbanned' => 'Ha acabado tu tiempo de baneo, espera un momento',
					'account_has_2' => 'Se registraron 2 cuentas o mas con el mismo nombre, contacte con un administrador para solucionar este error',
					'sessioned' => 'Cierra sesi&oacute;n para realizar esta acci&oacute;n, <a href="/web/logout">Click aqu&iacute;</a>',
					'maintenance' => 'El sitio web se encuentra en mantenimiento, acceda en otro momento!',
					'database' => 'Se ha producido un error en la base de datos',
					'success' => 'Has iniciado sesi&oacute;n, espera un momento'
				],

				'register' => [
					'empty' => 'No dejes espacios en blanco',
					'invalid_name' => 'Nombre de usuario inválido',
					'short_or_large_name' => 'El nombre de usuario debe contener de 4 a 15 letras',
					'short_or_large_password' => 'La clave debe contener de 4 a 30 letras',
					'banned' => 'Has sido baneado por: {@ban_added_by} por la razon de {@ban_reason} hasta la fecha {@ban_expire_date}',
					'user_exist' => 'Este usuario ya existe, utiliza otro',
					'mail_exist' => 'Este correo electronico ya existe, utiliza otro',
					'mails_not_same' => 'Los correos electronicos no coinciden',
					'maintenance' => 'El sitio web se encuentra en mantenimiento, acceda en otro momento!',
					'passwords_not_same' => 'Las contase&ntilde;as no coinciden',
					'invalid_mail' => 'Correo electronico inválido',
					'max_accounts' => 'Has superado el limite de cuentas registradas por IP, tienes {@your_accounts} cuentas y el maximo es {@max_accounts}',
					'sessioned' => 'Cierra sesi&oacute;n para registrar otra cuenta',
					'not_numbers_on_pass' => 'La contrase&ntilde;a debe contener n&uacute;meros y letras',
					'agree_terms' => 'Debes aceptar los terminos antes de continuar',
					'database' => 'Se ha producido un error en la base de datos',
					'success' => 'Te has registrado &eacute;xitosamente, espera un momento'
				],

				'forgot' => [
					'empty' => 'No dejes espacios en blanco',
					'incorrect_data' => 'Su correo electronico no esta registrado en la base de datos',
					'invalid_format' => 'Formato de correo electronico no valido',
					'short_or_large_password' => 'La clave debe contener de 4 a 30 letras',
					'passwords_not_same' => 'Las contase&ntilde;as no coinciden',
					'cant_be_same' => 'La contraseña no puede ser la anterior',
					// Back To Text
					'mail_title' => '¿Has olvidado tu contraseña?',
					'sended' => 'Ya se ha enviado un correo electronico a usted, espere 24 horas a que caduque el anterior',
					'database' => 'Se ha producido un error en la base de datos',
					'mail_error' => 'Se ha producido un error al enviar el correo',
					'sessioned' => 'Cierra sesi&oacute;n para registrar otra cuenta',
					'not_numbers_on_pass' => 'La contrase&ntilde;a debe contener n&uacute;meros y letras',
					'facebook' => 'Esta cuenta pertenece a un facebook, debe recuperarla desde su cuenta de facebook',
					'success' => 'Se ha enviado tu correo de recuperaci&oacute;n, si no lo encuentras revisa en la parte de correo no deseado (SPAM)',
					'success_val' => 'Se ha modificado tu contraseña correctamente, espere un momento'
				],

				'fbusername' => [
					'empty' => 'No dejes espacios en blanco',
					'incorrect_data' => 'El nombre de usuario ya esta en uso, utilize otro',
					'facebook_account' => 'Esta cuenta pertenece a una cuenta de facebook, no puede ser utilizada por logueo manual',
					'sessioned' => 'Cierra sesi&oacute;n para iniciar sesi&oacute;n en otra cuenta',
					'database' => 'Se ha producido un error en la base de datos',
					'short_or_large_name' => 'El nombre de usuario debe contener de 4 a 15 letras',
					'invalid_name' => 'Nombre de usuario invalido',
					'completed' => 'Se ha cambiado el nombre anteriormente',
					'unsessioned' => 'Abre sesi&oacute;n para realizar esta acci&oacute;n, <a href="/web">Click aqu&iacute;</a>',					
					'no_facebook' => 'Esta cuenta no esta asociada a un facebook',
					'success' => 'Has cambiado tu nombre de usuario, espera un momento'
				],

				'settings' => [
					// General
					'empty' => 'No dejes espacios en blanco',
					'invalid_color' => 'El color seleccionado no es valido',
					'dont_try_inyect' => 'No intentes hacer una inyeccion',
					'not_same' => 'Tu contraseña no coincide con la antigüa',
					'not_same_new' => 'Las nuevas contraseñas no coinciden',
					// Password
					'facebook_account' => 'Las cuentas de facebook no tienen autorizacion para realizar esta acci&oacute;n',
					'short_or_large_password' => 'La clave debe contener de 4 a 30 letras',
					'success_pass' => 'Contrase&ntilde;a cambiada exitosamente, espera un momento para loguearte',
					'cant_be_old_pass' => 'La nueva contraseña no puede ser la antigüa',
					'not_numbers_on_pass' => 'La contrase&ntilde;a debe contener n&uacute;meros y letras',
					// Mail
					'success_mail' => 'Se ha enviado un correo electronico a su nuevo correo para verificar el cambio de correo',
					'cant_be_old_mail' => 'El nuevo correo no puede ser el antigüo',
					'invalid_mail' => 'Correo electronico invalido',
					'mail_title' => 'Verificación de correo electronico',
					'not_same_new_mail' => 'Los correos electronicos no coinciden',
					'unsessioned' => 'Abre sesi&oacute;n para realizar esta acci&oacute;n, <a href="/web">Click aqu&iacute;</a>',
					'not_same_mail' => 'Este no es su antigüo correo',
					'mail_used' => 'Este correo electronico ya esta en uso',
					'mail_error' => 'Se ha producido un error al tratar de enviar el correo electronico',
					'mail_sended' => 'Ya se ha enviado un correo electronico a usted, espere 24 horas a que caduque el anterior',
					// Delete
					'success_mail_del' => 'Se ha enviado un correo electronico a su nuevo correo para verificar el cierre de su cuenta',
					'accept' => 'Debes aceptar las consecuencias de el cierre de su cuenta antes de continuar',
					'mail_title_del' => 'Decea eliminar su cuenta?',
					// Normal
					'database' => 'Se ha producido un error en la base de datos',
					'success' => 'Informaci&oacute;n cambiada exitosamente'
				],
			]
		];
	}

?>