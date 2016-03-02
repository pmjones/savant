--TEST--
reset elements
--FILE--
<?php
require_once '00_prepend.php';

$elem = array(
	'name' => 'x_reset',
	'value' => 'x_reset_value',
	'attribs' => array(
		'size' => '10',
		'xss' => '">XSS ATTACK<"',
	),
);

// array of output
$out = array();

// try with individual args
$out[] = $tpl->formReset($elem['name'], $elem['value'], $elem['attribs']);

// try with Solar-standard array
$out[] = $tpl->formReset($elem);

// try frozen by arg (should still be enabled)
$elem['attribs']['disable'] = true;
$out[] = $tpl->formReset($elem['name'], $elem['value'], $elem['attribs']);

// try frozen by array (should still be enabled)
unset($elem['attribs']['disable']);
$elem['disable'] = true;
$out[] = $tpl->formReset($elem);

// output
echo implode("\n", $out);
?>
--EXPECT--
<input type="reset" name="x_reset" value="x_reset_value" size="10" xss="&quot;&gt;XSS ATTACK&lt;&quot;" />
<input type="reset" name="x_reset" value="x_reset_value" size="10" xss="&quot;&gt;XSS ATTACK&lt;&quot;" />
<input type="reset" name="x_reset" value="x_reset_value" size="10" xss="&quot;&gt;XSS ATTACK&lt;&quot;" />
<input type="reset" name="x_reset" value="x_reset_value" size="10" xss="&quot;&gt;XSS ATTACK&lt;&quot;" />