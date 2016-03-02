--TEST--
submit elements
--FILE--
<?php
require_once '00_prepend.php';

$elem = array(
	'name' => 'x_submit',
	'value' => 'x_submit_value',
	'attribs' => array(
		'size' => '10',
		'xss' => '">XSS ATTACK<"',
	),
);

// array of output
$out = array();

// try with individual args
$out[] = $tpl->formSubmit($elem['name'], $elem['value'], $elem['attribs']);

// try with Solar-standard array
$out[] = $tpl->formSubmit($elem);

// try frozen by arg (should still be enabled)
$elem['attribs']['disable'] = true;
$out[] = $tpl->formSubmit($elem['name'], $elem['value'], $elem['attribs']);

// try frozen by array (should still be enabled)
unset($elem['attribs']['disable']);
$elem['disable'] = true;
$out[] = $tpl->formSubmit($elem);

// output
echo implode("\n", $out);

?>
--EXPECT--
<input type="submit" name="x_submit" value="x_submit_value" size="10" xss="&quot;&gt;XSS ATTACK&lt;&quot;" />
<input type="submit" name="x_submit" value="x_submit_value" size="10" xss="&quot;&gt;XSS ATTACK&lt;&quot;" />
<input type="submit" name="x_submit" value="x_submit_value" size="10" xss="&quot;&gt;XSS ATTACK&lt;&quot;" />
<input type="submit" name="x_submit" value="x_submit_value" size="10" xss="&quot;&gt;XSS ATTACK&lt;&quot;" />