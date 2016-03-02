<?php
$set = array(
	'Savant3.php',
	'Savant3/Error.php',
	'Savant3/Exception.php',
	'Savant3/Filter.php',
	'Savant3/Plugin.php',
	'Savant3/resources/Savant3_Filter_trimwhitespace.php',
	'Savant3/resources/Savant3_Plugin_ahref.php',
	'Savant3/resources/Savant3_Plugin_date.php',
	'Savant3/resources/Savant3_Plugin_htmlAttribs.php',
	'Savant3/resources/Savant3_Plugin_image.php',
);

$files = implode(',', $set);

passthru("phpdoc -f $files -t api -ti \"Savant3\" -dn \"Savant3\" -dc \"Savant3\"");
?>