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

	class generalPIN {

		public $texts = array(
			'texts' => [
				// General
				'empty' => 'No dejes espacios en blanco',
                    'not_same' => 'El codigo de seguridad no coincide con el anterior',
                    'not_same_new_pins' => 'Los codigos de seguridad no coinciden',
                    'shorter_or_larger_pin' => 'El codigo de seguridad debe tener de 4 a 30 caracteres',
                    'need_numbers_and_letters' => 'Codigo de seguridad necesita numeros y letras',
                    'success' => 'Acci&oacute;n realizada exitosamente, espere un momento',
                    'database' => 'Se ha producido un error en la base de datos'
			]
		);
	}

?>