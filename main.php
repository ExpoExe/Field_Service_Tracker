<?php
include 'core/init.php';
require 'core/database/connect.php';
include 'includes/head.php'; 

if(logged_in()){
	echo "Logged in";	
}else{
	echo "Logged out";	
}

?>

<span onClick="location.href='logout.php'" class="fake-link">LOGOUT</span>
