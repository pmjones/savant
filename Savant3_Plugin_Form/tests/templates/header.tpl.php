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

	<?php if ($this->feedback !== null): ?>
	<p style="border: 1px solid black; padding: 4px;">Operation was '<strong><?php $this->_($this->feedback) ?></strong>'</p>
	<?php endif; ?>	