<?php

function logged_in_redirect(){
	if(logged_in() === true){
		header('Location: main.php');
		exit();	
	}
}

function protect_page(){
	if(logged_in() === false){
		header('Location: denied.php');
		exit();
	}
}

function sanitize($data){
	global $db;
	return $db->real_escape_string($data);
}

function array_sanitize(&$item){
	global $db;
	return $db->real_escape_string($item);
}

function array_sanitize_int(&$item){
	return (int)$item;
}

function output_errors($errors){
	$output = array();
	foreach($errors as $error){
		$output[] = '<li>[' . $error . ']</li>';
	}	
	return '<ul>' . implode('', $output) . '</ul>';
}

?>