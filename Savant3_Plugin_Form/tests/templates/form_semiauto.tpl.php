		<table><tr><td>
		<?php
			
			// set a property
			echo $this->form('set', 'class', 'Savant-Form');
			
			// start a form 
			echo $this->form('begin');
			
			// add a hidden value before the layout
			echo $this->form('element', $this->elem['hide_me']);
			
			// BEGIN a new block
			echo $this->form('block', 'begin', "First Section", 'row');
			
			// text field
			echo $this->form('element', $this->elem['my_text']);
			
			// SPLIT into a new block
			echo $this->form('block', 'split');
			
			// checkbox with default value (array(checked, not-checked))
			echo $this->form('element', $this->elem['xbox']);
			
			// single select
			echo $this->form('element', $this->elem['picker']);
			
			// END THE BLOCK and put in some custom stuff.
			echo $this->form('block', 'end');
		?>
		
		<!-- the "clear: both;" is very important when you have floating elements -->
		<h1 style="clear: both; background-color: silver; border: 1px solid black; margin: 4px; padding: 4px;">Custom HTML Between Fieldset Blocks</h1>
		
		<?php
			// NEW BLOCK
			echo $this->form('block', 'begin', "Second Section", 'col');
			
			// multi-select with note
			echo $this->form('group', 'begin', 'Pick many:');
			echo $this->form('element', $this->elem['picker2']);
			
			// echo $this->form('note', "<br />Pick as many as you like; use the Ctrl key on Windows, or the Cmd key on Macintosh.");
			echo $this->form('group', 'end');
			
			// radio buttons
			echo $this->form('element', $this->elem['chooser']);
			
			// NEW BLOCK
			echo $this->form('block', 'begin', null, 'row');
			
			// text area
			echo $this->form('element', $this->elem['my_area']);
			
			// NEW BLOCK (clears floats)
			echo $this->form('block', 'begin', null, 'row', null, 'both');
			
			echo $this->form('element', array('type' => 'submit', 'name' => 'op'));
			echo $this->form('element', array('type' => 'reset', 'name' => 'op'));
			
			$elem = array(
				'type' => 'button',
				'name' => 'op',
				'value' => 'Click Me!',
				'attribs' => array(
					'onclick' => 'return alert("hello!")'
				)
			);
			
			echo $this->form('element', $elem);
			
			
			// end the form
			echo $this->form('end');
		?>
		</td></tr></table>
