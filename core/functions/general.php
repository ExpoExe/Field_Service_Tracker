<?php

function sanitize($data){
	global $db;
	return $db->real_escape_string($data);
}

function array_sanitize(&$item){
	global $db;
	return $db->real_escape_string($item);
}

function output_errors($errors){
	$output = array();
	foreach($errors as $error){
		$output[] = '<li>[' . $error . ']</li>';
	}	
	return '<ul>' . implode('', $output) . '</ul>';
}

?>