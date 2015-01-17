<?php

require 'core/database/connect.php';

function register_user($register_data){
	
	global $db;
	
	array_walk($register_data, 'array_sanitize');
	$register_data['password'] = md5($register_data['password']);
	
	$fields = '`' . implode('`, `', array_keys($register_data)) . '`';
	$data = '\'' .  implode('\', \'', $register_data) . '\'';
	
	$db->query("INSERT INTO `users` ($fields) VALUES ($data)");
	
}

function logged_in(){
	return(isset($_SESSION['user_id'])) ? true : false;
	}
	
function user_data($user_id){
	
	global $db;
	$data = array();
	$user_id = (int)$user_id;
	
	$num_args = func_num_args();
	$get_args = func_get_args();
	
	if($num_args > 1){
		unset($get_args[0]);
		$fields = '`' . implode('`, `', $get_args) . '`';
		$data = $db->query("SELECT $fields FROM `users` WHERE `user_id` = '$user_id'")->fetch_assoc();	

		return $data;
	}
	
}

function user_exists($username){
	
	global $db;
	$username = sanitize($username);
	$res = $db->query("SELECT `user_id` FROM `users` WHERE `username` = '$username'");

	if($res->num_rows == 0){
		return false;
	}else{return true;}
}

function email_exists($emailReg){
	
	global $db;
	$emailReg = sanitize($emailReg);
	if($emailReg === ''){
		return true;
	}else{
		$res = $db->query("SELECT `user_id` FROM `users` WHERE `email` = '$emailReg'");
	
		if($res->num_rows == 0){
			return false;
		}else{return true;}
	}
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