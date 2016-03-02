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
	'require' => true,
	'disable' => false,
	'options' => array(),
	'attribs' => array(),
	'feedback' => "I'm required.",
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


$tpl->feedback = (isset($_POST['op'])) ? $_POST['op'] : null;
$tpl->elem = $elem;

$tpl->display('header.tpl.php');
$tpl->display('form_fullauto.tpl.php');
echo "\n\n<hr />\n\n";
$tpl->display('form_semiauto.tpl.php');
$tpl->display('footer.tpl.php');
?>