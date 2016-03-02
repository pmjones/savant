<?php

/**
* 
* Example plugin for unit testing.
*
* @version $Id: Savant_Plugin_cycle.php,v 1.1 2004/10/04 01:45:53 pmjones Exp $
*
*/

require_once 'Savant/Plugin.php';

class Savant_Plugin_cycle extends Savant_Plugin {
	function cycle(&$savant)
	{
		return "REPLACES DEFAULT CYCLE";
	}
}
?>