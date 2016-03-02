--TEST--
radio elements
--FILE--
<?php
require_once '00_prepend.php';

$elem = array(
	'name' => 'x_radio',
	'value' => 1,
	'attribs' => array(
		'xss' => '">XSS ATTACK<"',
	),
	'options' => array('zero', 'one', 'two<xss_attack />', 'three', 'four', 'five'),
);

// array of output
$out = array();

// try with individual args (nothing checked)
$out[] = $tpl->formRadio($elem['name'], null, $elem['attribs'], $elem['options']) ;

// try with Solar-standard array
$out[] = $tpl->formRadio($elem);

// try separate label and radio attribs
$elem['attribs']['label_style'] = 'font-size: 80%;';
$out[] = $tpl->formRadio($elem);

// try frozen by arg
unset($elem['attribs']['label_style']);
$elem['attribs']['disable'] = true;
$out[] = $tpl->formRadio($elem['name'], $elem['value'], $elem['attribs'], $elem['options']);

// try frozen by array
unset($elem['attribs']['disable']);
$elem['disable'] = true;
$out[] = $tpl->formRadio($elem);

// output
echo implode("\n---\n", $out);

?>
--EXPECT--
<input type="hidden" name="x_radio" value="" /><label style="white-space: nowrap;"><input type="radio" name="x_radio" value="0" checked="checked" xss="&quot;&gt;XSS ATTACK&lt;&quot;" />zero</label><br />
<label style="white-space: nowrap;"><input type="radio" name="x_radio" value="1" xss="&quot;&gt;XSS ATTACK&lt;&quot;" />one</label><br />
<label style="white-space: nowrap;"><input type="radio" name="x_radio" value="2" xss="&quot;&gt;XSS ATTACK&lt;&quot;" />two&lt;xss_attack /&gt;</label><br />
<label style="white-space: nowrap;"><input type="radio" name="x_radio" value="3" xss="&quot;&gt;XSS ATTACK&lt;&quot;" />three</label><br />
<label style="white-space: nowrap;"><input type="radio" name="x_radio" value="4" xss="&quot;&gt;XSS ATTACK&lt;&quot;" />four</label><br />
<label style="white-space: nowrap;"><input type="radio" name="x_radio" value="5" xss="&quot;&gt;XSS ATTACK&lt;&quot;" />five</label>
---
<input type="hidden" name="x_radio" value="" /><label style="white-space: nowrap;"><input type="radio" name="x_radio" value="0" xss="&quot;&gt;XSS ATTACK&lt;&quot;" />zero</label><br />
<label style="white-space: nowrap;"><input type="radio" name="x_radio" value="1" checked="checked" xss="&quot;&gt;XSS ATTACK&lt;&quot;" />one</label><br />
<label style="white-space: nowrap;"><input type="radio" name="x_radio" value="2" xss="&quot;&gt;XSS ATTACK&lt;&quot;" />two&lt;xss_attack /&gt;</label><br />
<label style="white-space: nowrap;"><input type="radio" name="x_radio" value="3" xss="&quot;&gt;XSS ATTACK&lt;&quot;" />three</label><br />
<label style="white-space: nowrap;"><input type="radio" name="x_radio" value="4" xss="&quot;&gt;XSS ATTACK&lt;&quot;" />four</label><br />
<label style="white-space: nowrap;"><input type="radio" name="x_radio" value="5" xss="&quot;&gt;XSS ATTACK&lt;&quot;" />five</label>
---
<input type="hidden" name="x_radio" value="" /><label style="font-size: 80%;"><input type="radio" name="x_radio" value="0" xss="&quot;&gt;XSS ATTACK&lt;&quot;" />zero</label><br />
<label style="font-size: 80%;"><input type="radio" name="x_radio" value="1" checked="checked" xss="&quot;&gt;XSS ATTACK&lt;&quot;" />one</label><br />
<label style="font-size: 80%;"><input type="radio" name="x_radio" value="2" xss="&quot;&gt;XSS ATTACK&lt;&quot;" />two&lt;xss_attack /&gt;</label><br />
<label style="font-size: 80%;"><input type="radio" name="x_radio" value="3" xss="&quot;&gt;XSS ATTACK&lt;&quot;" />three</label><br />
<label style="font-size: 80%;"><input type="radio" name="x_radio" value="4" xss="&quot;&gt;XSS ATTACK&lt;&quot;" />four</label><br />
<label style="font-size: 80%;"><input type="radio" name="x_radio" value="5" xss="&quot;&gt;XSS ATTACK&lt;&quot;" />five</label>
---
<input type="hidden" name="x_radio" value="" />[&nbsp;]&nbsp;zero<br />
<input type="hidden" name="x_radio" value="1" />[x]&nbsp;one<br />
[&nbsp;]&nbsp;two<xss_attack /><br />
[&nbsp;]&nbsp;three<br />
[&nbsp;]&nbsp;four<br />
[&nbsp;]&nbsp;five
---
<input type="hidden" name="x_radio" value="" />[&nbsp;]&nbsp;zero<br />
<input type="hidden" name="x_radio" value="1" />[x]&nbsp;one<br />
[&nbsp;]&nbsp;two<xss_attack /><br />
[&nbsp;]&nbsp;three<br />
[&nbsp;]&nbsp;four<br />
[&nbsp;]&nbsp;five