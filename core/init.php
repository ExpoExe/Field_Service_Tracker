<?php

session_start();	
require 'core/database/connect.php';
require 'core/functions/users.php';
require 'core/functions/general.php';

if (logged_in() === true){
	$session_user_id = $_SESSION['user_id'];
	$user_data = user_data($session_user_id, 'user_id', 'username', 'password', 'first_name', 'last_name', 'email');
	$table_name = $user_data['username'] . $user_data['user_id'];
	$callbook_name = $user_data['username'] . $user_data['user_id'] . "_callbook";
	date_default_timezone_set('UTC');

}

$errors = array();

?>