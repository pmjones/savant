--TEST--
hidden elements
--FILE--
<?php
require_once '00_prepend.php';

$elem = array(
	'name' => 'x_hidden',
	'value' => 'x_hidden_value',
	'attribs' => array(
		'size' => '10',
		'xss' => '">XSS ATTACK<"',
	),
);

// array of output
$out = array();

// try with individual args
$out[] = $tpl->formHidden($elem['name'], $elem['value'], $elem['attribs']);

// try with Solar-standard array
$out[] = $tpl->formHidden($elem);

// try frozen by arg
$elem['attribs']['disable'] = true;
$out[] = $tpl->formHidden($elem['name'], $elem['value'], $elem['attribs']);

// try frozen by array
unset($elem['attribs']['disable']);
$elem['disable'] = true;
$out[] = $tpl->formHidden($elem);

// output
echo implode("\n", $out);

?>
--EXPECT--
<input type="hidden" name="x_hidden" value="x_hidden_value" size="10" xss="&quot;&gt;XSS ATTACK&lt;&quot;" />
<input type="hidden" name="x_hidden" value="x_hidden_value" size="10" xss="&quot;&gt;XSS ATTACK&lt;&quot;" />
<input type="hidden" name="x_hidden" value="x_hidden_value" size="10" xss="&quot;&gt;XSS ATTACK&lt;&quot;" />
<input type="hidden" name="x_hidden" value="x_hidden_value" size="10" xss="&quot;&gt;XSS ATTACK&lt;&quot;" />