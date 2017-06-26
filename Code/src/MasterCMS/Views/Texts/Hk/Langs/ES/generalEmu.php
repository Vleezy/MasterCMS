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
   
	namespace MasterCMS\Views\Texts\Hk\Langs\ES;

	use MasterCMS\Config\Config;	

	class generalEmu {

		public $texts = array(
			'texts' => [
				// General
				'empty' => 'No dejes espacios en blanco',
				'no_perms' => 'No tienes los suficientes permisos para ejecutar esta accion',
				'database' => 'Se ha producido un error en la base de datos',
                    'not_exist_emu' => 'La ruta del emulador es invalida',
                    'emu_must_be_internal' => 'El emulador debe estar alojado en este servidor para ser corrido desde el housekeeping',
                    'success_on' => 'Se encendio el emulador exitosamente',
                    'unavaliable' => 'Esta caracteristica aun no esta disponible',
                    'already_on' => 'El emulador ya esta encendido',
                    'need_on' => 'Esta accion requiere que el emulador este activo',
                    'cant_send_com' => 'No se pudo enviar el comando',
                    'command_sended' => 'Se envio el comando <b>{@command}</b> a el emulador'
			]
		);
	}

?>