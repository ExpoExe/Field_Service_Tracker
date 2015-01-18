<?php
include 'core/init.php';
protect_page();
include 'includes/head.php'; 

$success = "";

if(!empty($_POST)){
		
	foreach($_POST as $key=>$value){
		if(empty($value)  === true){
			if($key === $_POST['other_hours_desc']){
				$value = "";
			}else{
				$value = 0;
			}
		}
		echo $value;
	}
	/*
	if(empty($errors) === true){
		if(user_exists($_POST['usernameReg']) === true){
			$errors[] = 'Sorry, the username "' . $_POST['usernameReg'] . '" is already taken.';	
		}
		if(preg_match("/\\s/", $_POST['usernameReg']) == true){
			$errors[] = 'Your username must not contain any spaces.';	
		}
		if(strlen($_POST['passwordReg']) < 6){
			$errors[] = 'Your password must be at least 6 characters.';	
		}
		if($_POST['passwordReg'] !== $_POST['password_confirmReg']){
			$errors[] = 'Your passwords do not match.';	
		}
		if(empty($_POST['emailReg']) === false){
			if(filter_var($_POST['emailReg'], FILTER_VALIDATE_EMAIL) === false){
				$errors[] = 'A valid email address is required.';
			}
			if(email_exists($_POST['emailReg']) === true){
				$errors[] = 'Sorry, the email "' . $_POST['emailReg'] . '" is already taken.';	
			}
		}
	}*/
	
}else{
	$errors[] = 'No data was entered!';
}

if(isset($_GET['success']) && empty($_GET['success'])){
	$success = "You have been successfully registered!";
}else{
	
	if(empty($_POST) === false && empty($errors) === true){
		$register_data = array(
			'username' 		=> $_POST['usernameReg'],
			'password' 		=> $_POST['passwordReg'],
			'first_name'	=> $_POST['first_nameReg'],
			'last_name' 	=> $_POST['last_nameReg'],
			'email' 		=> $_POST['emailReg']
		);
		
			
		register_user($register_data);

		header('Location: updated.php?success');
		exit();
		
	}
}


?>

<link rel="stylesheet" media="handheld, screen and (max-width:1000px)" href="css/template_mobile.css">
<link rel="stylesheet" media="handheld, screen and (min-width:1001px)" href="css/template_desktop.css">

<div id="logout" onClick="location.href='logout.php'">LOGOUT</div>
<div style=" margin-bottom: 20px; clear:both;"></div>

<div id="newInput_container">
<h2>Your data has been successfully updated!</h2>
        <?php 
			if(empty($errors) === false){
				echo output_errors($errors);
			}
			echo $success;
		?>
        <div onClick="location.href='main.php'" id="update_button">Have more to Update?</div><br>

</div>
</body>
</html>