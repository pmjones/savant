		<table><tr><td>
		<?php
			echo $this->form('set', 'class', 'Savant-Form');
			echo $this->form('begin');
			echo $this->form('auto', $this->elem);
			
			$submit = array(
				'type'  => 'submit',
				'name'  => 'op',
				'value' => 'Save'
			);
			
			$reset = array(
				'type' => 'reset'
			);
			
			echo $this->form('group', 'begin');
			echo $this->form('element', $submit);
			echo $this->form('element', $reset);
			echo $this->form('group', 'end');
			
			echo $this->form('end');
		?>
		</td></tr></table>
		