<?php

set_error_handler(
	function ($errno, $errstr, $errfile, $errline) {
		if ( E_RECOVERABLE_ERROR===$errno ) {
			$matches = array();
			if(preg_match('/Argument \d* passed to [\s\S]* must be an instance of ([^, ]*), ([^ ]*) given/', $errstr, $matches)){
				$expectedClass = $matches[1];
				$actualClass = $matches[2];
				switch($expectedClass){
					case 'int':
					case 'integer':
  						return $actualClass === 'integer';
  					case 'float':
  					case 'double':
  					case 'real':
  						return $actualClass === 'double';
  					case 'bool':
  					case 'boolean':
  						return $actualClass === 'boolean';
  					case 'numeric':
  						return $actualClass === 'integer' || $actualClass === 'double';
  					case 'string':
  						return $actualClass === 'string';
  					case 'scalar':
  						return $actualClass === 'integer' || $actualClass === 'double' ||
  							$actualClass == 'boolean' || $actualClass === 'string';
  				}
  			}else {
  				return 1 === preg_match('/Argument \d* passed to [\s\S]* must be an instance of object, instance of ([^ ]*) given/', $errstr);
  			}
  		}
  		return false;
	}, E_RECOVERABLE_ERROR);
