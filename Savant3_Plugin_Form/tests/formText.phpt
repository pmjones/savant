--TEST--
text elements
--FILE--
<?php
require_once '00_prepend.php';

$elem = array(
	'name' => 'x_text',
	'value' => 'x_text_value',
	'attribs' => array(
		'size' => '10',
		'xss' => '">XSS ATTACK<"',
	),
);

// array of all output
$out = array();

// try with individual args
$out[] = $tpl->formText($elem['name'], $elem['value'], $elem['attribs']);

// try with Solar-standard array
$out[] = $tpl->formText($elem);

// frozen by args
$elem['attribs']['disable'] = true;
$out[] = $tpl->formText($elem['name'], $elem['value'], $elem['attribs']);

// frozen by array
unset($elem['attribs']['disable']);
$elem['disable'] = true;
$out[] = $tpl->formText($elem);

// output
echo implode("\n", $out);

?>
--EXPECT--
<input type="text" name="x_text" value="x_text_value" size="10" xss="&quot;&gt;XSS ATTACK&lt;&quot;" />
<input type="text" name="x_text" value="x_text_value" size="10" xss="&quot;&gt;XSS ATTACK&lt;&quot;" />
<input type="hidden" name="x_text" value="x_text_value" />x_text_value
<input type="hidden" name="x_text" value="x_text_value" />x_text_value