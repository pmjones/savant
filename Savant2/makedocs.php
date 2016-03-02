<?php
$set = array(
	'Savant2.php',
	'Savant2/Compiler.php',
	'Savant2/Error.php',
	'Savant2/Filter.php',
	'Savant2/PHPCodeAnalyzer.php',
	'Savant2/Plugin.php',
	'Savant2/Savant2_Compiler_basic.php',
	'Savant2/Savant2_Error_exception.php',
	'Savant2/Savant2_Error_pear.php',
	'Savant2/Savant2_Error_stack.php',
	'Savant2/Savant2_Filter_colorizeCode.php',
	'Savant2/Savant2_Filter_trimwhitespace.php',
	'Savant2/Savant2_Plugin_ahref.php',
	'Savant2/Savant2_Plugin_checkbox.php',
	'Savant2/Savant2_Plugin_cycle.php',
	'Savant2/Savant2_Plugin_dateformat.php',
	'Savant2/Savant2_Plugin_form.php',
	'Savant2/Savant2_Plugin_image.php',
	'Savant2/Savant2_Plugin_input.php',
	'Savant2/Savant2_Plugin_javascript.php',
	'Savant2/Savant2_Plugin_modify.php',
	'Savant2/Savant2_Plugin_options.php',
	'Savant2/Savant2_Plugin_radios.php',
	'Savant2/Savant2_Plugin_stylesheet.php',
	'Savant2/Savant2_Plugin_textarea.php',
);

$files = implode(',', $set);

passthru("phpdoc -f $files -t api -ti \"Savant2\" -dn \"Savant2\" -dc \"Savant2\"");
?>