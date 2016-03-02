--TEST--
file elements
--FILE--
<?php
require_once '00_prepend.php';

$elem = array(
	'name' => 'x_file',
	'value' => 'x_file_value',
	'attribs' => array(
		'size' => '10',
		'xss' => '">XSS ATTACK<"',
	),
);

$out = array();

// try with individual args
$out[] = $tpl->formFile($elem['name'], $elem['value'], $elem['attribs']);

// try with Solar-standard array
$out[] = $tpl->formFile($elem);

// try frozen by args
$elem['attribs']['disable'] = true;
$out[] = $tpl->formFile($elem['name'], $elem['value'], $elem['attribs']);

// try frozen by array
unset($elem['attribs']['disable']);
$elem['disable'] = true;
$out[] = $tpl->formFile($elem);

// output
echo implode("\n", $out);

?>
--EXPECT--
<input type="file" name="x_file" value="x_file_value" size="10" xss="&quot;&gt;XSS ATTACK&lt;&quot;" />
<input type="file" name="x_file" value="x_file_value" size="10" xss="&quot;&gt;XSS ATTACK&lt;&quot;" />
<input type="hidden" name="x_file" value="x_file_value" />x_file_value
<input type="hidden" name="x_file" value="x_file_value" />x_file_value