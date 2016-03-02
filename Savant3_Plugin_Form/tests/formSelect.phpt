--TEST--
select elements
--FILE--
<?php
require_once '00_prepend.php';

$elem = array(
	'name' => 'x_select',
	'value' => 1,
	'attribs' => array(
		'xss' => '">XSS ATTACK<"',
	),
	'options' => array('zero', 'one', 'two<xss_attack />', 'three', 'four', 'five'),
);

// array out output
$out = array();

// try with individual args, nothing selected
$out[] = $tpl->formSelect($elem['name'], null, $elem['attribs'], $elem['options']);

// try with Solar-standard array
$out[] = $tpl->formSelect($elem);

// try multiple (implied by name)
$elem['name'] = 'x_select[]';
$out[] = $tpl->formSelect($elem);

// try multiple (specified by attrib) -- should rename with [] suffix
$elem['name'] = 'x_select';
$elem['attribs']['multiple'] = 'multiple';
$out[] = $tpl->formSelect($elem);

// try multiple with multiples selected
$elem['value'] = array(1, 3);
$out[] = $tpl->formSelect($elem);

// try frozen by arg (multiple selected)
$elem['attribs']['disable'] = true;
$out[] = $tpl->formSelect($elem['name'], $elem['value'], $elem['attribs'], $elem['options']);

// try frozen by array (multiple selected)
unset($elem['attribs']['disable']);
$elem['disable'] = true;
$out[] = $tpl->formSelect($elem);

// output
echo implode("\n", $out);

?>
--EXPECT--
<select name="x_select" xss="&quot;&gt;XSS ATTACK&lt;&quot;">
	<option value="0" label="zero">zero</option>
	<option value="1" label="one">one</option>
	<option value="2" label="two&lt;xss_attack /&gt;">two&lt;xss_attack /&gt;</option>
	<option value="3" label="three">three</option>
	<option value="4" label="four">four</option>
	<option value="5" label="five">five</option>
</select>
<select name="x_select" xss="&quot;&gt;XSS ATTACK&lt;&quot;">
	<option value="0" label="zero">zero</option>
	<option value="1" label="one" selected="selected">one</option>
	<option value="2" label="two&lt;xss_attack /&gt;">two&lt;xss_attack /&gt;</option>
	<option value="3" label="three">three</option>
	<option value="4" label="four">four</option>
	<option value="5" label="five">five</option>
</select>
<select name="x_select[]" xss="&quot;&gt;XSS ATTACK&lt;&quot;" multiple="multiple">
	<option value="0" label="zero">zero</option>
	<option value="1" label="one" selected="selected">one</option>
	<option value="2" label="two&lt;xss_attack /&gt;">two&lt;xss_attack /&gt;</option>
	<option value="3" label="three">three</option>
	<option value="4" label="four">four</option>
	<option value="5" label="five">five</option>
</select>
<select name="x_select[]" xss="&quot;&gt;XSS ATTACK&lt;&quot;" multiple="multiple">
	<option value="0" label="zero">zero</option>
	<option value="1" label="one" selected="selected">one</option>
	<option value="2" label="two&lt;xss_attack /&gt;">two&lt;xss_attack /&gt;</option>
	<option value="3" label="three">three</option>
	<option value="4" label="four">four</option>
	<option value="5" label="five">five</option>
</select>
<select name="x_select[]" xss="&quot;&gt;XSS ATTACK&lt;&quot;" multiple="multiple">
	<option value="0" label="zero">zero</option>
	<option value="1" label="one" selected="selected">one</option>
	<option value="2" label="two&lt;xss_attack /&gt;">two&lt;xss_attack /&gt;</option>
	<option value="3" label="three" selected="selected">three</option>
	<option value="4" label="four">four</option>
	<option value="5" label="five">five</option>
</select>
<input type="hidden" name="x_select[]" value="1" />one<br />
<input type="hidden" name="x_select[]" value="3" />three
<input type="hidden" name="x_select[]" value="1" />one<br />
<input type="hidden" name="x_select[]" value="3" />three