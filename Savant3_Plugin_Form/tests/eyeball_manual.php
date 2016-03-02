<?php
require_once '00_prepend.php';

echo "<html><head><title>Savant3_Plugin_Form eyeball test</title></head><body><form>\n\n";

// button
$elem = array(
	'name' => 'x_button',
	'value' => 'x_button_value',
	'attribs' => array(
		'xss' => '">XSS ATTACK<"',
	),
);
echo $tpl->formButton($elem);
echo "

\n\n<hr />\n\n

";

// checkbox
$elem = array(
	'name' => 'x_checkbox',
	'value' => 1,
	'attribs' => array(
		'xss' => '">XSS ATTACK<"',
	),
);
echo $tpl->formCheckbox($elem) . "\n";
echo "

\n\n<hr />\n\n

";

// file
$elem = array(
	'name' => 'x_file',
	'value' => 'x_file_value',
	'attribs' => array(
		'size' => '10',
		'xss' => '">XSS ATTACK<"',
	),
);
echo $tpl->formFile($elem);
echo "

\n\n<hr />\n\n

";

// hidden
$elem = array(
	'name' => 'x_hidden',
	'value' => 'x_hidden_value',
	'attribs' => array(
		'size' => '10',
		'xss' => '">XSS ATTACK<"',
	),
);
echo $tpl->formHidden($elem);
echo "

\n\n<hr />\n\n

";

// image
$elem = array(
	'name' => 'x_image',
	'value' => 'http://phpsavant.com/etc/fester.jpg',
	'attribs' => array(
		'height' => '12',
		'width' => '60',
		'xss' => '">XSS ATTACK<"',
	),
);
echo $tpl->formImage($elem);
echo "

\n\n<hr />\n\n

";

// password
$elem = array(
	'name' => 'x_password',
	'value' => 'x_password_value',
	'attribs' => array(
		'size' => '10',
		'xss' => '">XSS ATTACK<"',
	),
);
echo $tpl->formPassword($elem);
echo "

\n\n<hr />\n\n

";

// radio
$elem = array(
	'name' => 'x_radio',
	'value' => 1,
	'attribs' => array(
		'xss' => '">XSS ATTACK<"',
	),
	'options' => array('zero', 'one', 'two<xss_attack />', 'three', 'four', 'five'),
);
echo $tpl->formRadio($elem);
echo "

\n\n<hr />\n\n

";

// reset
$elem = array(
	'name' => 'x_reset',
	'value' => 'x_reset_value',
	'attribs' => array(
		'size' => '10',
		'xss' => '">XSS ATTACK<"',
	),
);
echo $tpl->formReset($elem);
echo "

\n\n<hr />\n\n

";

// select
$elem = array(
	'name' => 'x_select',
	'value' => 1,
	'attribs' => array(
		'xss' => '">XSS ATTACK<"',
	),
	'options' => array('zero', 'one', 'two<xss_attack />', 'three', 'four', 'five'),
);
echo $tpl->formSelect($elem) . "\n";
echo "

\n\n<hr />\n\n

";

// submit
$elem = array(
	'name' => 'x_submit',
	'value' => 'x_submit_value',
	'attribs' => array(
		'size' => '10',
		'xss' => '">XSS ATTACK<"',
	),
);
echo $tpl->formSubmit($elem);
echo "

\n\n<hr />\n\n

";

// text
$elem = array(
	'name' => 'x_text',
	'value' => 'x_text_value',
	'attribs' => array(
		'size' => '10',
		'xss' => '">XSS ATTACK<"',
	),
);
echo $tpl->formText($elem);
echo "

\n\n<hr />\n\n

";

// textarea
$elem = array(
	'name' => 'x_textarea',
	'value' => "Plain text\n\n<xss_attack />\n\nMore text",
	'attribs' => array(
		'cols' => '60',
		'rows' => '15',
		'xss' => '">XSS ATTACK<"',
	),
);
echo $tpl->formTextarea($elem);
echo "

\n\n<hr />\n\n

";

// done!
echo "</form></body></html>";
?>
