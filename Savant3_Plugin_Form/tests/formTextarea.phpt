--TEST--
textarea elements
--FILE--
<?php
require_once '00_prepend.php';

$elem = array(
	'name' => 'x_textarea',
	'value' => "Plain text\n\n<xss_attack />\n\nMore text",
	'attribs' => array(
		'cols' => '60',
		'rows' => '15',
		'xss' => '">XSS ATTACK<"',
	),
);

// array of output
$out = array();

// try with individual args
$out[] = $tpl->formTextarea($elem['name'], $elem['value'], $elem['attribs']);

// try with Solar-standard array
$out[] = $tpl->formTextarea($elem);

// try frozen by arg
$elem['attribs']['disable'] = true;
$out[] = $tpl->formTextarea($elem['name'], $elem['value'], $elem['attribs']);

// try frozen by array
unset($elem['attribs']['disable']);
$elem['disable'] = true;
$out[] = $tpl->formTextarea($elem);

// output
echo implode("\n", $out);
?>
--EXPECT--
<textarea name="x_textarea" cols="60" rows="15" xss="&quot;&gt;XSS ATTACK&lt;&quot;">Plain text

&lt;xss_attack /&gt;

More text</textarea>
<textarea name="x_textarea" cols="60" rows="15" xss="&quot;&gt;XSS ATTACK&lt;&quot;">Plain text

&lt;xss_attack /&gt;

More text</textarea>
<input type="hidden" name="x_textarea" value="Plain text

&lt;xss_attack /&gt;

More text" />Plain text<br />
<br />
&lt;xss_attack /&gt;<br />
<br />
More text
<input type="hidden" name="x_textarea" value="Plain text

&lt;xss_attack /&gt;

More text" />Plain text<br />
<br />
&lt;xss_attack /&gt;<br />
<br />
More text