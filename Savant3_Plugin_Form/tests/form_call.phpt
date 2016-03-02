--TEST--
form elements by __call()
--FILE--
<?php
require_once '00_prepend.php';

// option set
$opts = array('one', 'two', 'three', 'four', 'five');

// output
$out = array();

// button
$name = 'x_button';
$value = 'x_button_value';
$label = strtoupper($name);
$attribs = array('xss' => '">XSS ATTACK<"');
$out[] =  $tpl->form('button', $name, $value, $label, $attribs);

// checkbox
$name = 'x_checkbox';
$value = 1;
$label = strtoupper($name);
$attribs = array('xss' => '">XSS ATTACK<"');
$out[] =  $tpl->form('Checkbox', $name, $value, $label, $attribs);

// file
$name = 'x_file';
$value = 'x_file_value';
$label = strtoupper($name);
$attribs = array(
	'size' => '10',
	'xss' => '">XSS ATTACK<"',
);
$out[] =  $tpl->form('File', $name, $value, $label, $attribs);

// hidden
$name = 'x_hidden';
$value = 'x_hidden_value';
$label = strtoupper($name);
$attribs = array(
	'size' => '10',
	'xss' => '">XSS ATTACK<"',
);
$out[] =  $tpl->form('Hidden', $name, $value, $label, $attribs);

// image
$name = 'x_image';
$value = 'http://phpsavant.com/etc/fester.jpg';
$label = strtoupper($name);
$attribs = array(
	'height' => '12',
	'width' => '60',
	'xss' => '">XSS ATTACK<"',
);
$out[] =  $tpl->form('Image', $name, $value, $label, $attribs);

// password
$name = 'x_password';
$value = 'x_password_value';
$label = strtoupper($name);
$attribs = array(
	'size' => '10',
	'xss' => '">XSS ATTACK<"',
);
$out[] =  $tpl->form('Password', $name, $value, $label, $attribs);

// radio
$name = 'x_radio';
$value = 1;
$label = strtoupper($name);
$attribs = array('xss' => '">XSS ATTACK<"');
$options = array('zero', 'one', 'two<xss_attack />', 'three', 'four', 'five');
$out[] =  $tpl->form('Radio', $name, $value, $label, $attribs, $options);

// reset
$name = 'x_reset';
$value = 'x_reset_value';
$label = strtoupper($name);
$attribs = array(
	'size' => '10',
	'xss' => '">XSS ATTACK<"',
);
$out[] =  $tpl->form('Reset', $name, $value, $label, $attribs);

// select
$name = 'x_select';
$value = 1;
$label = strtoupper($name);
$attribs = array('xss' => '">XSS ATTACK<"');
$options = array('zero', 'one', 'two<xss_attack />', 'three', 'four', 'five');
$out[] =  $tpl->form('Select', $name, $value, $label, $attribs, $options);

// submit
$name = 'x_submit';
$value = 'x_submit_value';
$label = strtoupper($name);
$attribs = array(
	'size' => '10',
	'xss' => '">XSS ATTACK<"',
);
$out[] =  $tpl->form('Submit', $name, $value, $label, $attribs);

// text
$name = 'x_text';
$value = 'x_text_value';
$label = strtoupper($name);
$attribs = array(
	'size' => '10',
	'xss' => '">XSS ATTACK<"',
);
$out[] =  $tpl->form('text', $name, $value, $label, $attribs);

// textarea
$name = 'x_textarea';
$value = "Plain text\n\n<xss_attack />\n\nMore text";
$label = strtoupper($name);
$attribs = array(
	'cols' => '60',
	'rows' => '15',
	'xss' => '">XSS ATTACK<"',
);
$out[] =  $tpl->form('textarea', $name, $value, $label, $attribs);


// done!
echo implode("\n----\n", $out);

?>
--EXPECT--
<div>
				<table>
					<tr>
						<th>
							<label>X_BUTTON</label>
						</th>
						<td>
							<input type="button" name="x_button" value="x_button_value" xss="&quot;&gt;XSS ATTACK&lt;&quot;" />
						</td>
					</tr>
----

					<tr>
						<th>
							<label>X_CHECKBOX</label>
						</th>
						<td>
							<input type="hidden" name="x_checkbox" value="0" />
							<input type="checkbox" name="x_checkbox" value="1" checked="checked" xss="&quot;&gt;XSS ATTACK&lt;&quot;" />
						</td>
					</tr>
----

					<tr>
						<th>
							<label>X_FILE</label>
						</th>
						<td>
							<input type="file" name="x_file" value="x_file_value" size="10" xss="&quot;&gt;XSS ATTACK&lt;&quot;" />
						</td>
					</tr>
----

					<tr>
						<th>
							<label>X_HIDDEN</label>
						</th>
						<td>
							<input type="hidden" name="x_hidden" value="x_hidden_value" size="10" xss="&quot;&gt;XSS ATTACK&lt;&quot;" />
						</td>
					</tr>
----

					<tr>
						<th>
							<label>X_IMAGE</label>
						</th>
						<td>
							<input type="image" name="x_image" src="http://phpsavant.com/etc/fester.jpg" height="12" width="60" xss="&quot;&gt;XSS ATTACK&lt;&quot;" />
						</td>
					</tr>
----

					<tr>
						<th>
							<label>X_PASSWORD</label>
						</th>
						<td>
							<input type="password" name="x_password" value="x_password_value" size="10" xss="&quot;&gt;XSS ATTACK&lt;&quot;" />
						</td>
					</tr>
----

					<tr>
						<th>
							<label>X_RADIO</label>
						</th>
						<td>
							<input type="hidden" name="x_radio" value="" />
							<label style="white-space: nowrap;">
							<input type="radio" name="x_radio" value="0" xss="&quot;&gt;XSS ATTACK&lt;&quot;" />zero</label><br />

							<label style="white-space: nowrap;">
							<input type="radio" name="x_radio" value="1" checked="checked" xss="&quot;&gt;XSS ATTACK&lt;&quot;" />one</label><br />

							<label style="white-space: nowrap;">
							<input type="radio" name="x_radio" value="2" xss="&quot;&gt;XSS ATTACK&lt;&quot;" />two&lt;xss_attack /&gt;</label><br />

							<label style="white-space: nowrap;">
							<input type="radio" name="x_radio" value="3" xss="&quot;&gt;XSS ATTACK&lt;&quot;" />three</label><br />

							<label style="white-space: nowrap;">
							<input type="radio" name="x_radio" value="4" xss="&quot;&gt;XSS ATTACK&lt;&quot;" />four</label><br />

							<label style="white-space: nowrap;">
							<input type="radio" name="x_radio" value="5" xss="&quot;&gt;XSS ATTACK&lt;&quot;" />five</label>
						</td>
					</tr>
----

					<tr>
						<th>
							<label>X_RESET</label>
						</th>
						<td>
							<input type="reset" name="x_reset" value="x_reset_value" size="10" xss="&quot;&gt;XSS ATTACK&lt;&quot;" />
						</td>
					</tr>
----

					<tr>
						<th>
							<label>X_SELECT</label>
						</th>
						<td>
							<select name="x_select" xss="&quot;&gt;XSS ATTACK&lt;&quot;">
	
								<option value="0" label="zero">zero</option>
	
								<option value="1" label="one" selected="selected">one</option>
	
								<option value="2" label="two&lt;xss_attack /&gt;">two&lt;xss_attack /&gt;</option>
	
								<option value="3" label="three">three</option>
	
								<option value="4" label="four">four</option>
	
								<option value="5" label="five">five</option>

							</select>
						</td>
					</tr>
----

					<tr>
						<th>
							<label>X_SUBMIT</label>
						</th>
						<td>
							<input type="submit" name="x_submit" value="x_submit_value" size="10" xss="&quot;&gt;XSS ATTACK&lt;&quot;" />
						</td>
					</tr>
----

					<tr>
						<th>
							<label>X_TEXT</label>
						</th>
						<td>
							<input type="text" name="x_text" value="x_text_value" size="10" xss="&quot;&gt;XSS ATTACK&lt;&quot;" />
						</td>
					</tr>
----

					<tr>
						<th>
							<label>X_TEXTAREA</label>
						</th>
						<td>
							<textarea name="x_textarea" cols="60" rows="15" xss="&quot;&gt;XSS ATTACK&lt;&quot;">Plain text

&lt;xss_attack /&gt;

More text</textarea>
						</td>
					</tr>