<?php

/**
* 
* Output a value using echo after processing with optional modifier
* functions.
* 
* Allows you to pass a space-separated list of value-manipulation
* functions so that the value is "massaged" before output. For
* example, if you want to strip slashes, force to lower case, and
* convert to HTML entities (as for an input text box), you might do
* this:
* 
* $this->modify($value, 'stripslashes strtolower htmlentities');
* 
* This program is free software; you can redistribute it and/or modify
* it under the terms of the GNU Lesser General Public License as
* published by the Free Software Foundation; either version 2.1 of the
* License, or (at your option) any later version.
* 
* This program is distributed in the hope that it will be useful, but
* WITHOUT ANY WARRANTY; without even the implied warranty of
* MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
* Lesser General Public License for more details.
* 
* @license http://www.gnu.org/copyleft/lesser.html LGPL
* 
* @author Paul M. Jones <pmjones@ciaweb.net>
* 
* @package Savant
* 
* @version $Id: Savant_Plugin_modify.php,v 1.1 2004/10/04 01:45:52 pmjones Exp $
* 
* @access public
* 
* @param object &$savant A reference to the calling Savant object.
* 
* @param string $value The value to be printed.
* 
* @param string $functions A space-separated list of
* single-parameter functions to be applied to the $value before
* printing.
* 
* @return string
* 
*/

require_once 'Savant/Plugin.php';

class Savant_Plugin_modify extends Savant_Plugin {

	function modify(&$savant, $value, $functions = null)
	{
		// is there a space-delimited function list?
		if (is_string($functions)) {
			
			// yes.  split into an array of the
			// functions to be called.
			$list = explode(' ', $functions);
			
			// loop through the function list and
			// apply to the output in sequence.
			foreach ($list as $func) {
				if (function_exists($func)) {
					$value = $func($value);
				}
			}
		}
		
		return $value;
	}

}
?>