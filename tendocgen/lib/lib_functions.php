<?php

define('PATH_STATIC','/var/www/tendocgen');

function userNotice($notice) {
	return $notice;
}

function getVar($src,$name,$type,$required = True,$return = false,$acceptEmpty = true)
{
	$pass = false;

	if($src == 'get') {
		if(!isset($_GET[$name])) {
			if($required) {
				if($return == false) trigger_error("Missing data",E_USER_ERROR);
				else return false;
			}
			else return false;
		}
		else $var = trim($_GET[$name]);
	}
	elseif($src == 'post') {
		if(!isset($_POST[$name])) {
			if($required) {
				if($return == false) trigger_error("Missing data",E_USER_ERROR);
				else return false;
			}
			else return false;
		}
		else $var = trim($_POST[$name]);
	}
	elseif(gettype($src) == 'array') {
		if ( isset($src[$name])) $var = trim($src[$name]);
		elseif ($required) {
			if($return == False) trigger_error("Missing data",E_USER_ERROR);
			else return False;
		}
		else return False;
	}

	if ($var == '') {
		if ($acceptEmpty) return False;
		else {
			if ($return) return False;
			else trigger_error("Missing data",E_USER_ERROR);
		}
	}

	switch($type)
	{
		case "bool":
			if($var === "1" || $var === 'on' || $var === 'yes') return 1;
			else return 0;
			break;

		case "int":
			return intval($var);
			break;


		case "ip":
			if(preg_match('/^\-?[0-9]*$/',$var)) return intval($var);
			break;

		case "username":
			//A word character is a character from a-z, A-Z, 0-9, including the _ (underscore) character.
			if(preg_match('/^[\w\.\d]{3,32}$/',$var)) return $var;
			break;

		case "money":
			if(preg_match('/^[\$]*[0-9]+\.*[0-9]*$/',$var)) return floatval(preg_replace('/\$/','',$var));
			elseif($var == "") return 0;
			break;

		case "date":
			return date('Y-m-d',strtotime($var));
// 			if(preg_match('/^[0-9]{1,2}\/[0-9]{1,2}\/[0-9]{2,4}$/',$var))
// 			{
// 				$tmp = explode('/',$var);
// 				if(count($tmp) == 3 && $tmp[1] > 0 && $tmp[1] < 13 && $tmp[0] > 0 && $tmp[0] < 32) return $tmp[2] . "-" . $tmp[1] . "-" . $tmp[0];
// 			}
// 			elseif(preg_match('/^[0-9]{4}\-[0-9]{1,2}\-[0-9]{1,2}$/',$var))
// 			{
// 				$tmp = explode('-',$var);
// 				if(count($tmp) == 3 && $tmp[1] > 0 && $tmp[1] < 13 && $tmp[2] > 0 && $tmp[2] < 32) return $tmp[0] . "-" . $tmp[1] . "-" . $tmp[2];
// 			}
// 			break;

		case "safeString":
			//String should be protected before inserting in db. This does not protect. Use to check small strings like peoples names
			$var = strip_tags($var);
			return trim($var);
			break;

		case "password":
			if(preg_match('/^[\w]{6,20}$/',$var)) return $var;
			break;

		case "float":
			return floatval($var);
			break;

		case "url":
			if(preg_match('/^(http:\/\/)?(www\.)?\w+\.[A-z]{2,4}\.[A-z]{0,4}$/',$var)) return $var;
			break;

		case "phone":
			if(preg_match('/^[\(\)0-9\-\s]{7,17}$/',$var))  return $var;
			break;

		case "email":
			if(preg_match('/^[\w\.]+@+[\w\.]+\.[A-z\.]+$/',$var)) return $var;
			break;

		case "SHA1Hash":
			if(preg_match('/^[0-9,a-f]{40}$/',$var)) return $var;
			break;

		case "empty":
			if($var == "") return $var;
			break;
			
		default:
			if (substr($type,0,3) == 'int') {
				$tmp = extract_extra(substr($type,4));
				$num = count($tmp);
				$min = $tmp[0];
				$tmp2 = intval($var);
				if ($tmp2 < $min) break;
				if ($num > 1) {
					$max = intval($tmp[1]);
					if ($tmp2 > $max) break;
				}
				return $tmp2;		
			}
	}
	if($return) return false;
	else trigger_error("Invalid data",E_USER_ERROR);
	die();
}

function extract_extra($str) {
	$tmp = trim($str);
	$tmp = explode(' ',$tmp);
	return $tmp;
}

function getVars($src, $namesTypes, $required=True, $return=false, $acceptEmpty=true) {
	$out = array();
	foreach ($namesTypes as $name => $type) {
		$out[$name] = getVar($src, $name, $type, $required, $return, $acceptEmpty);
	}
	return $out;	
}

function randomHash()
{
	return sha1(mt_rand() . mt_rand() . mt_rand() . mt_rand() . mt_rand() . time());
}

function generatePDF($filename,$data = array()) {

	//Produce the custom .TEX file
	ob_start();
	include ($filename);
	$latex = ob_get_clean();

	//Setup paths
	$filename_out = './temp';
	file_put_contents($filename_out . '.tex', $latex);
	exec('/usr/bin/latexmk -pdf -cd ' . $filename_out . '.tex');
	header('Location: ' . $filename_out . '.pdf');
}

function intToString($int)
{
	switch($int)
	{
		case 0:
			return "none";
			break;

		case 1:
			return "one";
			break;

		case 2:
			return "two";
			break;

		case 3:
			return "three";
			break;

		case 4:
			return "four";
			break;

		case 5:
			return "five";
			break;

		case 6:
			return "six";
			break;

		case 7:
			return "seven";
			break;

		case 8:
			return "eight";
			break;

		case 9:
			return "nine";
			break;

		case 10:
			return "ten";
			break;

		case 11:
			return "eleven";
			break;

		case 12:
			return "twelve";
			break;

		case 13:
			return "thirteen";
			break;

		case 14:
			return "fourteen";
			break;

		case 15:
			return "fifteen";
			break;

		case 16:
			return "sixteen";
			break;
	}
}
