<?php 
include('lib_html.php');
include('lib_documents.php');
include('lib_functions.php');


function formfield($type,$name,$value=False,$attrs=array()) {
	if ($type == 'bool') {
		if ($value) $attrs['checked'] = '"checked"';
		return checkbox($name,$attrs);
	}
	elseif ($type == 'date') {
		$attrs['style'] = 'width: 100pt';
		return datepicker($name, $value, $attrs);
	}
	elseif ($type == 'money') {
		$attrs['style'] = 'width: 80pt';
		$script = 'min:10, max:10000, step:10, numberFormat: "C"';
		return numberspinner($name, $value, $attrs, $script);
	}
	elseif (substr($type,0,3) == 'int') {
		$attrs['style'] = 'width: 20pt';
		$tmp = extract_extra(substr($type, 4));
		$len = count($tmp);
		$script = False;
		if ($len > 0) {
			$script = 'min:'.$tmp[0];
			if ($len > 1) $script .= ', max:'.$tmp[1];
			if ($len > 2) $script .= ', step:'.$tmp[2];
			if ($value === False) $value = $tmp[0];
		}
		return numberspinner($name, $value, $attrs, $script);
	}
	else {
		return textbox($name, $value, $attrs);
	}
}

function generate_inputTable($document, $items) {
	$table = array();
	foreach ($items as $item) {
		$field = $document->get_field($item);
		$value = $field['value'];
		if ($field['value'] === False) {
			if (isset($_GET[$item])) {
				$table[label($item,$field['string']).':'] = formfield($field['type'], $item, strip_tags($_GET[$item]));
				if(strlen($_GET[$item]) >= 1) {
					$table[label($item,$field['string']).':'] .= userNotice('Invalid data');
				}
			}
			else {
				$table[label($item,$field['string']).':'] = formfield($field['type'], $item);
			}
		}
		else {
			$table[label($item,$field['string']).':'] = formfield($field['type'], $item, $field['value']);
		}
	}
	return $table;
}