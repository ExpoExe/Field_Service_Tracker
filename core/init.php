<?php

session_start();	
require 'core/database/connect.php';
require 'core/functions/users.php';
require 'core/functions/general.php';

if (logged_in() === true){
	$session_user_id = $_SESSION['user_id'];
	$user_data = user_data($session_user_id, 'user_id', 'username', 'password', 'first_name', 'last_name', 'email');
}

$errors = array();

?>