--TEST--
frozen form layout
--FILE--
<?php
require_once '00_prepend.php';

// option set
$opts = array('one', 'two', 'three', 'four', 'five');

// build the array of form elements
$elem = array();

$elem['hide_me'] = array(
	'name'    => 'hide_me',
	'type'    => 'hidden',
	'label'   => null,
	'value'   => 'hidden & valued',
	'require' => false,
	'disable' => false,
	'options' => array(),
	'attribs' => array(),
	'feedback' => array()
);

$elem['my_text'] = array(
	'name'    => 'my_text',
	'type'    => 'text',
	'label'   => 'Enter some text here',
	'value'   => '',
	'require' => false,
	'disable' => false,
	'options' => array(),
	'attribs' => array(),
	'feedback' => "I'm not required.",
);

$elem['xbox'] = array(
	'name'    => 'xbox',
	'type'    => 'checkbox',
	'label'   => 'Check this:',
	'value'   => '',
	'require' => false,
	'disable' => false,
	'options' => array(1, 0),
	'attribs' => array(),
	'feedback' => array('One message', 'Another message')
);

$elem['picker'] = array(
	'name'    => 'picker',
	'type'    => 'select',
	'label'   => 'Pick one',
	'value'   => '',
	'require' => false,
	'disable' => false,
	'options' => $opts,
	'attribs' => array(),
	'feedback' => array()
);

$elem['picker2'] = array(
	'name'    => 'picker2',
	'type'    => 'select',
	'label'   => 'Pick many',
	'value'   => '',
	'require' => false,
	'disable' => false,
	'options' => $opts,
	'attribs' => array('multiple' => 'multiple'),
	'feedback' => array()
);

$elem['chooser'] = array(
	'name'    => 'chooser',
	'type'    => 'radio',
	'label'   => 'Choose one',
	'value'   => '',
	'require' => false,
	'disable' => false,
	'options' => $opts,
	'attribs' => array(),
	'feedback' => array()
);

$elem['my_area'] = array(
	'name'    => 'my_area',
	'type'    => 'textarea',
	'label'   => 'Type a lot of words',
	'value'   => '',
	'require' => false,
	'disable' => false,
	'options' => array(),
	'attribs' => array('rows' => 12, 'cols' => 48),
	'feedback' => array()
);



// build the default values for the form elements
foreach (array_keys($elem) as $name) {
	$elem[$name]['name'] = $name;
	if (isset($_POST[$name])) {
		$elem[$name]['value'] = $_POST[$name];
	}
}


$_SERVER['REQUEST_URI'] = 'http://example.com/index.php';

$tpl->feedback = (isset($_POST['op'])) ? $_POST['op'] : null;
$tpl->elem = $elem;

// force the form the freeze
$tpl->form('set', 'freeze', true);

$tpl->display('header.tpl.php');
$tpl->display('form_fullauto.tpl.php');
$tpl->display('footer.tpl.php');
?>
--EXPECT--
<html>
	<head>
		<title>Form Test</title>
		<style>
			
			body, table, tr, th, td {
				font-family: Verdana;
				font-size: 9pt;
				background-color: aliceblue;
			}
			
			div.Savant-Form {
				margin: 8px;
			}
			
			fieldset.Savant-Form {
				margin: 8px;
				border-top:    1px solid silver;
				border-left:   1px solid silver;
				border-bottom: 1px solid gray;
				border-right:  1px solid gray;
				padding: 4px;
			}
			
			legend.Savant-Form{
				padding: 2px 4px;
				color: #036;
				font-weight: bold;
				font-size: 120%;
			}
			
			table.Savant-Form {
				border-spacing: 0px;
				margin: 0px;
				spacing: 0px;
				padding: 0px;
			}
			
			tr.Savant-Form {
			}
			
			th.Savant-Form {
				padding: 4px;
				spacing: 0px;
				border: 0px;
				text-align: right;
				vertical-align: top;
			}
			
			td.Savant-Form {
				padding: 4px;
				spacing: 0px;
				border: 0px;
				text-align: left;
				vertical-align: top;
			}
			
			label.Savant-Form {
				font-weight: bold;
			}
			
			input[type="text"] {
				font-family: monospace;
				font-size: 9pt;
			}
			
			textarea {
				font-family: monospace;
				font-size: 9pt;
			}
			
		</style>
	</head>
	<body>

				<table><tr><td>
		
		<form action="http://example.com/index.php" method="post" enctype="multipart/form-data">
							<input type="hidden" name="hide_me" value="hidden &amp; valued" />
			<div class="Savant-Form">
				<table class="Savant-Form">
					<tr class="Savant-Form">
						<th class="Savant-Form">
							<label class="Savant-Form">Enter some text here</label>
						</th>
						<td class="Savant-Form">
							<input type="hidden" name="my_text" value="" /><br /><span style="color: red; font-size: 80%;">I'm not required.</span>
						</td>
					</tr>
					<tr class="Savant-Form">
						<th class="Savant-Form">
							<label class="Savant-Form">Check this:</label>
						</th>
						<td class="Savant-Form">
							<input type="hidden" name="xbox" value="0" />[&nbsp;]<br /><span style="color: red; font-size: 80%;">One message</span><br /><span style="color: red; font-size: 80%;">Another message</span>
						</td>
					</tr>
					<tr class="Savant-Form">
						<th class="Savant-Form">
							<label class="Savant-Form">Pick one</label>
						</th>
						<td class="Savant-Form">
							<input type="hidden" name="picker" value="0" />one
						</td>
					</tr>
					<tr class="Savant-Form">
						<th class="Savant-Form">
							<label class="Savant-Form">Pick many</label>
						</th>
						<td class="Savant-Form">
							<input type="hidden" name="picker2[]" value="0" />one
						</td>
					</tr>
					<tr class="Savant-Form">
						<th class="Savant-Form">
							<label class="Savant-Form">Choose one</label>
						</th>
						<td class="Savant-Form">
							<input type="hidden" name="chooser" value="" />
							<input type="hidden" name="chooser" value="0" />[x]&nbsp;one<br />
[&nbsp;]&nbsp;two<br />
[&nbsp;]&nbsp;three<br />
[&nbsp;]&nbsp;four<br />
[&nbsp;]&nbsp;five
						</td>
					</tr>
					<tr class="Savant-Form">
						<th class="Savant-Form">
							<label class="Savant-Form">Type a lot of words</label>
						</th>
						<td class="Savant-Form">
							<input type="hidden" name="my_area" value="" />
						</td>
					</tr>
					<tr class="Savant-Form">
						<th class="Savant-Form">
						</th>
						<td class="Savant-Form">
							<input type="submit" name="op" value="Save" />
							<input type="reset" name="" />
						</td>
					</tr>
				</table>
			</div>
		</form>		</td></tr></table>
				
	</body>
</html>