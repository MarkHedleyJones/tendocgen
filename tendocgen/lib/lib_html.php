<?php

$postscript = '';

function attrs ($attrs) {
	if ($attrs != false) {
		$out = '';
		foreach ($attrs AS $name => $val) {
			$out .= ' ' . $name . '="' . $val . '"';
		}
		return $out;
	}
	else return false;
}

function redirect($url) {
	header('Location: ' . $url);
	die();
}

function start_tag($type, $attrs = array()) {
	return '<' . $type . attrs($attrs) . '>';
}

function end_tag($type) {
	return '</' . $type . '>';
}

function block($type, $body = false, $attrs = array()) {
	return start_tag($type,$attrs) . ($body != false ? $body : '') . end_tag($type);
}

function inline($type, $attrs = false) {
	return start_tag($type,$attrs);
}

function button($text, $attrs = false) {
	return block('button',$text,$attrs);
}

function input($type, $name, $value=False, $attrs=array()) {
	$attrs['type'] = $type;
	$attrs['name'] = $name;
	$attrs['id'] = $name;
	if ($value) $attrs['value'] = $value;
	return inline('input', $attrs);
}

function textbox($name, $text=false, $attrs = array()) {
	return input('text',$name, $text, $attrs);
}

function checkbox($name, $attrs = array()) {
	return input('checkbox', $name);
}

function datepicker($name, $date=False, $attrs=array(), $script=False) {
	$GLOBALS['postscript'] .= '$( "#' . $name . '").datepicker({'.$script.'});';
	return textbox($name, $date, $attrs);
}

function numberspinner($name, $value=False, $attrs=array(), $script=False) {
	$GLOBALS['postscript'] .= '$( "#' . $name . '").spinner({'.$script.'});';
	if ($value != False) $GLOBALS['postscript'] .= '$( "#' . $name . '").spinner( "value", '.$value.');';
	return textbox($name, $value, $attrs);
}

function label($name,$text,$attrs = array()) {
	$attrs['for'] = $name;
	return block('label',$text,$attrs);
}

function upload($name,$attrs = array()) {
	return input('file', $name);
}

function select($name, $options, $selectedIndex = false, $attrs = array()) {
	$tmp = '';
	$tmp .= start_tag('select',$attrs);
	foreach ($options AS $key => $value) {
		$attr = array('value'=>$key);
		if ($selectedIndex == $key) $attr['selected'] = 'selected';
		$tmp .= block('option',$value,$attr);
	}
	$tmp .= end_tag('select');
	return $tmp;
}

function h1($text,$attrs = false) {
	return block('h1',$text, $attrs);
}

function h2($text,$attrs = false) {
	return block('h2',$text, $attrs);
}

function h3($text,$attrs = false) {
	return block('h3',$text, $attrs);
}

function img($src, $alt, $attrs = array()) {
	$attrs['src'] = $src;
	$attrs['alt'] = $alt;
	return inline('img',$attrs);
}

function p($text, $attrs = false) {
	return block('p', $text, $attrs);
}

function href($text, $href, $attrs = array()) {
	$attrs['href'] = $href;
	return block('a', $text, $attrs);
}

function table($rows, $attrs = array()) {
	$tmp = '';
	$tmp .= start_tag('table',$attrs);
	foreach($rows AS $th => $td) {
		$tmp .= start_tag('tr');
		$tmp .= block('th',$th);
		if (is_array($td)) {
			foreach($td AS $tmp) {
				$tmp .= block('td',$tmp);
			}
		}
		else $tmp .= block('td',$td);
		$tmp .= end_tag('tr');
	}
	$tmp .= end_tag('table');
	return $tmp;
}


class Element {
	
	protected $content = array();
			
	public function wrap($element, $attrs = false) {
		array_unshift($this->content, start_tag($element,$attrs));
		array_push($this->content, end_tag($element));
	}
	
	public function append($content) {
		array_push($this->content,$content);
	}
	
	public function prepend($content) {
		array_unshift($this->content, $content);
	}
	
	public function render() {
		foreach($this->content AS $item) {
			if (is_object($item)) $item->render();
			elseif (is_string($item)) echo $item;
		}
	}
	
	public function as_array() {
		return $this->content;
	}
}

class Form extends Content {
	
	public $attrs = array();
	
	public function __construct($action,$attrs=array()) {
		$this->attrs['action'] = $action;
	}
		
	public function button($text, $attrs = array()) {		
		$this->append(button($text,$attrs));
	}
	
	public function textbox($name, $attrs = array()) {
		$this->append(textbox($name,$attrs));	
	}
	
	public function datepicker($name, $attrs = array()) {
		$this->append(datepicker($name, $attrs));
	}
	
	public function numberspinner($name, $attrs=array()) {
		$this->append(numberspinner($name, $value=False, $attrs=array()));
	}
	
	public function checkbox($name, $attrs = array()) {
		$this->append(checkbox($name, $attrs = array()));
	}
	
	public function label($name,$text,$attrs = array()) {
		$this->append(label($name,$text,$attrs = array()));
	}
	
	public function upload($name, $attrs = array()) {
		$this->append(upload($name, $attrs));
	}
	
	public function select($name, $options, $selectedIndex = false, $attrs = array()) {
		$this->append(select($name,$options,$selectedIndex,$attrs));
	}
		
	public function render() {
		$this->wrap('form',$this->attrs);
		parent::render();
	}
}

class Content extends Element {
	
	public function h1($text,$attrs = array()) {
		$this->append(h1($text,$attrs));
	}
	
	public function h2($text,$attrs = array()) {
		$this->append(h2($text,$attrs));
	}
	
	public function h3($text,$attrs = array()) {
		$this->append(h3($text,$attrs));
	}
	
	public function img($src, $alt, $attrs = array()) {
		$this->append(img($src, $alt, $attrs));
	}
	
	public function href($text, $href, $attrs = array()) {
		$this->append(href($text, $href, $attrs));
	}
	
	public function p($text,$attrs = array()) {
		$this->append(p($text, $attrs));
	}
	
	public function br($attrs = array()) {
		$this->append(inline('br',$attrs));
	} 
	
	public function table($rows, $attrs = array()) {
		$this->append(table($rows, $attrs));
	}
}

class Page extends Element {
	
	protected $title, $description;
	
	public function __construct($title,$description) {
		$this->title = $title;
		$this->description = $description;
	}
	

	public function render() {
		$this->append(block('script',false,array(
				'type'=> 'text/javascript',
				'src' => '//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js')));
		$this->append(block('script',false,array(
				'type'=> 'text/javascript',
				'src' => '/static/scripts/globalize.js')));
		$this->append(block('script',false,array(
				'type'=> 'text/javascript',
				'src' => '/static/scripts/jquery.mousewheel.js')));
		$this->append(block('script',false,array(
				'type'=> 'text/javascript',
				'src' => '//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js')));
		if ($GLOBALS['postscript'] != '') {
			$this->append(block('script', $GLOBALS['postscript'], array(
					'type'=> 'text/javascript')));
		}
		$this->wrap('div',array('id'=>'content'));
		$this->wrap('body');
		$head = new Element();
		$head->append(block('title',$this->title));
		$head->append(inline('meta',array('Description'=>$this->description)));
		$head->append(inline('link',array(
				'rel' => 'stylesheet',
				'type' => 'text/css',
				'href' => '/static/south-street/jquery-ui-1.10.3.custom.min.css')));
		$head->wrap('head');
		$this->prepend($head);
		$this->wrap('html',array('lang'=>'en'));
		$this->prepend('<!DOCTYPE HTML>');
		parent::render();
	}
}