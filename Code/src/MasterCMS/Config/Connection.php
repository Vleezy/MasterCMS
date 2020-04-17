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
   
	namespace MasterCMS\Config;

	class Connection {

		private static $data = array(
			'HOST'          =>         '127.0.0.1',
	        'PORT'          =>         '3306',
	        'USER'          =>         'root',
	        'PASS'          =>         '',
	        'DB'            =>         'database'
		);
		
		public static $con;

		public function __construct()
		{
	        try {
		        if (!extension_loaded('mysqli')) {
		        	throw new \Exception('MasterCMS need MySQLi extension');
		        } else if (!extension_loaded('curl')) {
		        	throw new \Exception('MasterCMS need cURL extension');
		        } else {
		        	if (!self::$con) {
		        		$this->run();
		        	}
		        }
	        } catch (\Exception $e) {
	        	die($e->getMessage());
	        }
		}

		public function run()
		{
			try {
    			self::$con = new \mysqli();
    			self::$con->connect(self::$data['HOST'], self::$data['USER'], self::$data['PASS'], self::$data['DB'], self::$data['PORT']);
		        $rute = ROOT;
		        $ruteStyles = MAIN_ROOT;
		        if (self::$con->connect_error) {
					throw new \Exception("Error conecting to the MySQL Server: " . self::$con->connect_error);
		        } else if (!self::$con->set_charset("utf8")) {
		            throw new \Exception("Error loading MySQL Character: " . self::$con->error);
		        } else if (!is_writable($rute)) {
	        		throw new \Exception("<b>{$rute}</b> most be writable");
	        	} else if (!is_writable($ruteStyles)) {
	        		throw new \Exception("<b>{$ruteStyles}</b> most be writable");
	        	} else {
	        		$query = self::$con->query("SELECT * FROM master_config");
 		        		if (!$query) {
	        			throw new \Exception("MasterCMS needs <b>master_config</b> table");
	        		}
	        	}
 			} catch (\Exception $e) {
	        	die($e->getMessage());
	        }
		}

		public function query($query) {
        	$result = self::$con->query($query);
	        return $result;
	    }

	    public function num_rows($row)
	    {
    		if (is_object($row)) {
	    		$row = $row->num_rows;
	    	} else {
	    		$row = self::$con->query($row);
	    		$row = $row->num_rows;
	    	}

	    	return $row;
	    }

	    public function fetch_assoc($query)
	    {
	    	if (is_object($query)) {
	    		$query = mysqli_fetch_assoc($query);
	    	} else {
	    		$query = self::$con->query($query);
	    		$query = mysqli_fetch_assoc($query);
	    	}

	    	return $query;
	    }

	    public function fetch_array($query)
	    {
	    	if (is_object($query)) {
	    		$query = mysqli_fetch_array($query);
	    	} else {
	    		$query = self::$con->query($query);
	    		$query = mysqli_fetch_array($query);
	    	}
	    	return $query;
	    }

	    public function real_escape_string($str)
	    {
	    	$str = self::$con->real_escape_string($str);
	    	return $str;
	    }

	    public function close()
	    {
	    	self::$con->close();
	    }

	    public function __destruct()
	    {
	    	if (self::$con) {
	    		$this->close();
	    	}
	    }

	    public function sqlImport($file)
		{

		    $delimiter = ';';
		    $file = fopen($file, 'r');
		    $isFirstRow = true;
		    $isMultiLineComment = false;
		    $sql = '';

		    while (!feof($file)) {

		        $row = fgets($file);

		        if ($isFirstRow) {
		            $row = preg_replace('/^\x{EF}\x{BB}\x{BF}/', '', $row);
		            $isFirstRow = false;
		        }

		        if (trim($row) == '' || preg_match('/^\s*(#|--\s)/sUi', $row)) {
		            continue;
		        }

		        $row = trim($this->clearSQL($row, $isMultiLineComment));

		        if (preg_match('/^DELIMITER\s+[^ ]+/sUi', $row)) {
		            $delimiter = preg_replace('/^DELIMITER\s+([^ ]+)$/sUi', '$1', $row);
		            continue;
		        }

		        $offset = 0;
		        $data = '';
		        while (strpos($row, $delimiter, $offset) !== false) {
		            $delimiterOffset = strpos($row, $delimiter, $offset);
		            if ($this->isQuoted($delimiterOffset, $row)) {
		                $offset = $delimiterOffset + strlen($delimiter);
		            } else {
		                $sql = trim($sql . ' ' . trim(substr($row, 0, $delimiterOffset)));
		                $data .= self::$con->query($sql);

		                $row = substr($row, $delimiterOffset + strlen($delimiter));
		                $offset = 0;
		                $sql = '';
		            }
		        }
		        $sql = trim($sql . ' ' . $row);
		    }

		    if (strlen($sql) > 0) {
		        $data .= self::$con->query($row);
		    }

		    fclose($file);

		    if (!$data) {
		    	return false;
		    } else {
		    	return true;
		    }
		}

		public function clearSQL($sql, $isMultiComment)
		{
		    if ($isMultiComment) {
		        if (preg_match('#\*/#sUi', $sql)) {
		            $sql = preg_replace('#^.*\*/\s*#sUi', '', $sql);
		            $isMultiComment = false;
		        } else {
		            $sql = '';
		        }
		        if(trim($sql) == ''){
		            return $sql;
		        }
		    }

		    $offset = 0;
		    while (preg_match('{--\s|#|/\*[^!]}sUi', $sql, $matched, PREG_OFFSET_CAPTURE, $offset)) {
		        list($comment, $foundOn) = $matched[0];
		        if ($this->isQuoted($foundOn, $sql)) {
		            $offset = $foundOn + strlen($comment);
		        } else {
		            if (substr($comment, 0, 2) == '/*') {
		                $closedOn = strpos($sql, '*/', $foundOn);
		                if ($closedOn !== false) {
		                    $sql = substr($sql, 0, $foundOn) . substr($sql, $closedOn + 2);
		                } else {
		                    $sql = substr($sql, 0, $foundOn);
		                    $isMultiComment = true;
		                }
		            } else {
		                $sql = substr($sql, 0, $foundOn);
		                break;
		            }
		        }
		    }
		    return $sql;
		}

		public function isQuoted($offset, $text)
		{
		    if ($offset > strlen($text))
		        $offset = strlen($text);

		    $isQuoted = false;
		    for ($i = 0; $i < $offset; $i++) {
		        if ($text[$i] == "'")
		            $isQuoted = !$isQuoted;
		        if ($text[$i] == "\\" && $isQuoted)
		            $i++;
		    }
		    return $isQuoted;
		}
	}

?>
