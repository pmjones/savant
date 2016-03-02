--TEST--
image elements
--FILE--
<?php
require_once '00_prepend.php';

$elem = array(
	'name' => 'x_image',
	'value' => 'x_image_source.png',
	'attribs' => array(
		'height' => '12',
		'width' => '60',
		'xss' => '">XSS ATTACK<"',
	),
);

// array of output
$out = array();

// try with individual args
$out[] = $tpl->formImage($elem['name'], $elem['value'], $elem['attribs']);

// try with Solar-standard array
$out[] = $tpl->formImage($elem);

// try frozen by arg
$elem['attribs']['disable'] = true;
$out[] = $tpl->formImage($elem['name'], $elem['value'], $elem['attribs']);

// try frozen by array
unset($elem['attribs']['disable']);
$elem['disable'] = true;
$out[] = $tpl->formImage($elem);

// output
echo implode("\n", $out);
?>
--EXPECT--
<input type="image" name="x_image" src="x_image_source.png" height="12" width="60" xss="&quot;&gt;XSS ATTACK&lt;&quot;" />
<input type="image" name="x_image" src="x_image_source.png" height="12" width="60" xss="&quot;&gt;XSS ATTACK&lt;&quot;" />
<image alt="x_image" src="x_image_source.png" height="12" width="60" xss="&quot;&gt;XSS ATTACK&lt;&quot;" />
<image alt="x_image" src="x_image_source.png" height="12" width="60" xss="&quot;&gt;XSS ATTACK&lt;&quot;" />