<?php

require 'core/database/connect.php';

function logged_in(){
	return(isset($_SESSION['user_id'])) ? true : false;
	}

function user_exists($username){
	
	global $db;
	$username = sanitize($username);
	$res = $db->query("SELECT `user_id` FROM `users` WHERE `username` = '$username'");

	if($res->num_rows == 0){
		return false;
	}else{return true;}
}

function login($username, $password){
	
	global $db;
	$username = sanitize($username);
	$password = md5($password);
	$user_id = NULL;
	$query = "SELECT `user_id` FROM `users` WHERE `username` = '$username' AND `password` = '$password'";
	$res = $db->query($query);
		
	if($res->num_rows == 1){
		$row = $res->fetch_assoc();
		$user_id = $row['user_id'];
		echo $user_id;
	}
	
	return ($user_id !== NULL) ? $user_id : false;
}

?>