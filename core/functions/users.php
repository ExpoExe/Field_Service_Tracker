<?php

require 'core/database/connect.php';

/*
LOGGING IN AND REGISTERING
*/

function register_user($register_data){
	
	global $db;
	global $table_name;
	global $session_user_id;
	
	array_walk($register_data, 'array_sanitize');
	$register_data['password'] = md5($register_data['password']);
	
	$fields = '`' . implode('`, `', array_keys($register_data)) . '`';
	$data = '\'' .  implode('\', \'', $register_data) . '\'';
	
	//Add new user to `users` table
	$db->query("INSERT INTO `users` ($fields) VALUES ($data)");
	
	$user_id = $db->query("SELECT `user_id` FROM `users` WHERE `username` = '{$register_data['username']}'")->fetch_assoc();
	$table_name = $register_data['username'] . $user_id['user_id'];
	
	//create new tables
	$db->query("CREATE TABLE $table_name AS (SELECT * FROM `user_template`)");
	$db->query("UPDATE $table_name SET `user_id` = {$user_id['user_id']}");

	$new_table = ($table_name . "_callbook");
	$db->query("CREATE TABLE $new_table AS (SELECT * FROM `callbook_template`)");
	$db->query("UPDATE $new_table SET `user_id` = {$user_id['user_id']}");
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

/*
USER SPECIFIC TABLES
*/

function get_all_current_data(){
	
	global $db;
	global $table_name;

	return $db->query("SELECT * FROM $table_name")->fetch_assoc();
	
}

function check_date(){
	
	global $db;
	global $table_name;
	
	$lastmodified = $db->query("SELECT `lastmodified` FROM $table_name")->fetch_assoc();
	
	//Convert query result to string			
	$old_date = implode("-", $lastmodified);
	//Trim to year-month-day
	$old_date = substr($old_date, 0, 10);
	
	//Get date at time of update as a string
	$new_date = date("Y-m-d H:i:s O");
	//Trim to year-month-day
	$new_date = substr($new_date, 0, 10);
	
	//Create arrays out of trimmed dates
	$old_date = explode('-', $old_date);
	$new_date = explode('-', $new_date);
	
	/*
	Compare day [2], month [1], and year [0]
	Return values tell add_up() how to sum data from update()
	1 = Same day. All fields must be updated
	2 = Different day, same month and year. Day must be reset, month must update, year must update
	3 = Different month, same year. Day and month must be reset, year must update
	4 = Different year. All fields must reset then update
	*/
	if($old_date[2] == $new_date[2] && $old_date[1] == $new_date[1] && $old_date[0] == $new_date[0]){
		return 1;
	}else if($old_date[1] == $new_date[1] && $old_date[0] == $new_date[0]){
		return 2;
	}else if($old_date[0] == $new_date[0]){
		return 3;
	}else{
		return 4;
	}

}

function add_up($update_data){
	
	global $db;
	global $table_name;
	
	$data = $update_data;
	
	$fields = '`' . implode('`, `', array_keys($update_data)) . '`';

	$current_data = $db->query("SELECT $fields FROM $table_name")->fetch_assoc();	

	switch(check_date()){
	
		case 1:
			//Update all fields
			foreach($current_data as $key=>$value){
				$data[$key]  +=  $value;	
			}
			return $data;
			break;
		case 2:
			//Reset day fields, set to new data
			foreach(array_slice($current_data, 0, 7) as $key=>$value){
				$data[$key]  =  $value;	
			}
			//Update month and year fields
			foreach(array_slice($current_data, 8) as $key=>$value){
				$data[$key]  +=  $value;	
			}
			return $data;
			break;
		case 3:
			//Reset day and month fields, set to new data
			foreach(array_slice($current_data, 0, 15) as $key=>$value){
				$data[$key]  =  $value;	
			}
			//Update year fields
			foreach(array_slice($current_data, 16) as $key=>$value){
				$data[$key]  +=  $value;	
			}
			return $data;
			break;
		case 4:
			//Reset all fields, set to new data
			foreach($current_data as $key=>$value){
				$data[$key]  =  $value;	
			}
			return $data;
			break;
		default:
			echo "It looks like something horrible happened. Please let me know if you see this.";
			return $data;
			break;

	}

}


function update($update_data){
	
	global $db;
	global $user_data;
	global $table_name;
	
	//Clean data to protect against MySQL injection ???
	array_walk($update_data, 'array_sanitize_int');
	
	//Calculate correct and up-to-date information
	$data = add_up($update_data);
	
	$query = "UPDATE $table_name SET ";
	
	//Create query of all fields and values
	foreach($data as $key=>$value){
		$query .= $key  . '=' . $value . ', ';
	}
	
	//Remove last comma
	$query[(strlen($query)-2)] = '';
	
	//Add data to correct user table
	$db->query($query);

}

/*
CALLBOOK FUNCTIONS
*/

function has_calls(){
	
	global $db;
	global $callbook_name;
	
	$result = $db->query("SELECT * FROM $callbook_name");
	
	if ($result->num_rows > 1){
		return true;	
	}else{
		return false;	
	}

}

?>