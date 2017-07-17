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
   
	namespace MasterCMS\Models;

	use MasterCMS\Config\{Config, Connection};

	class Protection {
		
		private $con;

		public function __construct()
		{
			$this->con = new Connection();
		}

		public function encriptPassword($data) 
        { 
            $data = $data . "019347835845934934934MASTERCMS234934934";
            return rtrim(strtr(base64_encode($data), '+/', '-_'), '=');
        } 

		public function filter($str)
	    {
	        $str = $this->con->real_escape_string($str);
	        $str = mysqli_real_escape_string($value);
			$str = htmlspecialchars($value);
			$str = filter_var($value, FILTER_SANITIZE_STRING);
	        return $str;
	    }

	    public function htmlFilter($str)
	    {
	        $str = $this->con->real_escape_string($str);
	        $str = mysqli_real_escape_string($value);
			$str = filter_var($value, FILTER_SANITIZE_STRING);
	        return $str;
	    }

	    public function urlFilter($text)
		{
	        $text = html_entity_decode($text);
	        $text = " ".$text;
	        $text = str_replace('(((f|ht){1}tp://)[-a-zA-Z0-9@:%_\+.~#?&//=]+)', '<a href="\\1" target=_blank>\\1</a>', $text);
	        $text = str_replace('(((f|ht){1}tps://)[-a-zA-Z0-9@:%_\+.~#?&//=]+)', '<a href="\\1" target=_blank>\\1</a>', $text);
	        $text = str_replace('([[:space:]()[{}])(www.[-a-zA-Z0-9@:%_\+.~#?&//=]+)', '\\1<a rel="nofollow" href="http://\\2" target=_blank>\\2</a>', $text);
	        $text = str_replace('([_\.0-9a-z-]+@([0-9a-z][0-9a-z-]+\.)+[a-z]{2,3})', '<a href="mailto:\\1" target=_blank>\\1</a>', $text);
	        return $text;
		}  

		public function __destruct()
		{
			$this->con->close();
		}
	}

?>
