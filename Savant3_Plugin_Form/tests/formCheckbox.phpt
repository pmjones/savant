--TEST--
checkbox elements
--FILE--
<?php
require_once '00_prepend.php';

$elem = array(
	'name' => 'x_checkbox',
	'value' => 1,
	'attribs' => array(
		'xss' => '">XSS ATTACK<"',
	),
);

// all output
$out = array();

// try with individual args, not-checked, default unchecked/checked values
$out[] = $tpl->formCheckbox($elem['name'], 0, $elem['attribs']);

// try with individual args, checked, default unchecked/checked values
$out[] = $tpl->formCheckbox($elem['name'], 1, $elem['attribs']);

// try with Solar-standard array, checked, default unchecked/checked values
$out[] = $tpl->formCheckbox($elem);

// try with array, and custom value string
$elem['options'] = 'yes';
$out[] = $tpl->formCheckbox($elem);

// try with array, and custom value array (one element)
$elem['options'] = array('yes');
$out[] = $tpl->formCheckbox($elem);

// try with array, not checked, and custom value array (two elements)
$elem['options'] = array('yes', 'no');
$elem['value'] = 'no';
$out[] = $tpl->formCheckbox($elem);

// try frozen by args
$elem['attribs']['disable'] = true;
$out[] = $tpl->formCheckbox($elem['name'], 1, $elem['attribs']);

// try frozen by array
unset($elem['attribs']['disable']);
$elem['disable'] = true;
$out[] = $tpl->formCheckbox($elem);

// output
echo implode("\n", $out);

?>
--EXPECT--
<input type="hidden" name="x_checkbox" value="0" /><input type="checkbox" name="x_checkbox" value="1" xss="&quot;&gt;XSS ATTACK&lt;&quot;" />
<input type="hidden" name="x_checkbox" value="0" /><input type="checkbox" name="x_checkbox" value="1" checked="checked" xss="&quot;&gt;XSS ATTACK&lt;&quot;" />
<input type="hidden" name="x_checkbox" value="0" /><input type="checkbox" name="x_checkbox" value="1" checked="checked" xss="&quot;&gt;XSS ATTACK&lt;&quot;" />
<input type="hidden" name="x_checkbox" value="" /><input type="checkbox" name="x_checkbox" value="yes" xss="&quot;&gt;XSS ATTACK&lt;&quot;" />
<input type="hidden" name="x_checkbox" value="" /><input type="checkbox" name="x_checkbox" value="yes" xss="&quot;&gt;XSS ATTACK&lt;&quot;" />
<input type="hidden" name="x_checkbox" value="no" /><input type="checkbox" name="x_checkbox" value="yes" xss="&quot;&gt;XSS ATTACK&lt;&quot;" />
<input type="hidden" name="x_checkbox" value="1" />[x]
<input type="hidden" name="x_checkbox" value="no" />[&nbsp;]