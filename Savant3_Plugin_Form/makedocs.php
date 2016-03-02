<?php
$set = array(
	'Savant3/resources/Savant3_Plugin_form.php',
	'Savant3/resources/Savant3_Plugin_form_element.php',
	'Savant3/resources/Savant3_Plugin_formButton.php',
	'Savant3/resources/Savant3_Plugin_formCheckbox.php',
	'Savant3/resources/Savant3_Plugin_formFile.php',
	'Savant3/resources/Savant3_Plugin_formHidden.php',
	'Savant3/resources/Savant3_Plugin_formImage.php',
	'Savant3/resources/Savant3_Plugin_formPassword.php',
	'Savant3/resources/Savant3_Plugin_formRadio.php',
	'Savant3/resources/Savant3_Plugin_formReset.php',
	'Savant3/resources/Savant3_Plugin_formSelect.php',
	'Savant3/resources/Savant3_Plugin_formSubmit.php',
	'Savant3/resources/Savant3_Plugin_formText.php',
	'Savant3/resources/Savant3_Plugin_formTextarea.php',
);

$files = implode(',', $set);

passthru("phpdoc -f $files -t api -ti \"Savant3_Plugin_Form\" -dn \"Savant3_Plugin_Form\" -dc \"Savant3_Plugin_Form\"");
?>