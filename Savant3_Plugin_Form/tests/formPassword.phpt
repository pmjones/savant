--TEST--
password elements
--FILE--
<?php
require_once '00_prepend.php';

$elem = array(
	'name' => 'x_password',
	'value' => 'x_password_value',
	'attribs' => array(
		'size' => '10',
		'xss' => '">XSS ATTACK<"',
	),
);

// array of output
$out = array();

// try with individual args
$out[] = $tpl->formPassword($elem['name'], $elem['value'], $elem['attribs']);

// try with Solar-standard array
$out[] = $tpl->formPassword($elem);

// try frozen by arg
$elem['attribs']['disable'] = true;
$out[] = $tpl->formPassword($elem['name'], $elem['value'], $elem['attribs']);

// try frozen by array
unset($elem['attribs']['disable']);
$elem['disable'] = true;
$out[] = $tpl->formPassword($elem);

// output
echo implode("\n", $out);
?>
--EXPECT--
<input type="password" name="x_password" value="x_password_value" size="10" xss="&quot;&gt;XSS ATTACK&lt;&quot;" />
<input type="password" name="x_password" value="x_password_value" size="10" xss="&quot;&gt;XSS ATTACK&lt;&quot;" />
<input type="hidden" name="x_password" value="x_password_value" />xxxxxxxx
<input type="hidden" name="x_password" value="x_password_value" />xxxxxxxx