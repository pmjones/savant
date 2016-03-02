--TEST--
button elements
--FILE--
<?php
require_once '00_prepend.php';

$elem = array(
	'name' => 'x_button',
	'value' => 'x_button_value',
	'attribs' => array(
		'xss' => '">XSS ATTACK<"',
	),
);

$out = array();

// try with individual args
$out[] = $tpl->formButton($elem['name'], $elem['value'], $elem['attribs']);

// try with Solar-standard array
$out[] = $tpl->formButton($elem);

// try frozen by args
$elem['attribs']['disable'] = true;
$out[] = $tpl->formButton($elem['name'], $elem['value'], $elem['attribs']);

// try frozen by array
unset($elem['attribs']['disable']);
$elem['disable'] = true;
$out[] = $tpl->formButton($elem);

// output
echo implode("\n", $out);

?>
--EXPECT--
<input type="button" name="x_button" value="x_button_value" xss="&quot;&gt;XSS ATTACK&lt;&quot;" />
<input type="button" name="x_button" value="x_button_value" xss="&quot;&gt;XSS ATTACK&lt;&quot;" />
[x_button_value]
[x_button_value]