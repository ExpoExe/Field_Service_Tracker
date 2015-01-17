<?php

include 'core/init.php';
include 'includes/head.php'; 

$success = "";

if(!empty($_POST)){
	
	$required_fields = array('usernameReg', 'passwordReg', 'password_confirmReg');
	foreach($_POST as $key=>$value){
		if(empty($value) && in_array($key, $required_fields) === true){
			$errors[] = 'Please complete the required fields.';
			break 1;
		}
	}
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
	}
	
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

		header('Location: register.php?success');
		exit();
		
	}
}
	
?>

<script type="text/javascript">
	$(document).ready(function(){
		$('#registration_form').hide().delay(300).fadeIn(2000);
		
	});
</script>

<body>
	<div id="reg_intro">
        <h1>Hello, Welcome to</h1>
        <h2>Field Service Tracker</h2>
        <div id="login_details">
        	<form name="login_form" method="post" action="login.php">
				<table border="0">
                  <tbody>
                    <tr>
                      <td>Username:</td>
                      <td><input name="username" type="text"></td>
                    </tr>
                    <tr>
                      <td>Password:</td>
                      <td><input name="password" type="password"></td>
                    </tr>
                  </tbody>
				</table>
            </form>
        </div>
        <div onClick="document.forms['login_form'].submit();" id="login">Login</div>
        <div id="registration_container">
        	<p>Don't have an account yet?<br>
            <span id="register_here" class="fake-link">Register</span></p><br>
            <?php 
				if(empty($errors) === false){
					echo output_errors($errors);
				}
				echo $success;
			?>
            <form id="registration_form" name="register" method="post" action="register.php">
                <table border="0">
                  <tbody>
                    <tr>
                      <td>Username *:</td>
                      <td><input type="text" name="usernameReg"></td>
                    </tr>
                    <tr>
                      <td>Password *:</td>
                      <td><input type="text" name="passwordReg"></td>
                    </tr>
                    <tr>
                      <td>Confirm Password *:</td>
                      <td><input type="text" name="password_confirmReg"></td>
                    </tr>
                    <tr>
                      <td>First Name <span style="color:#727272;">(optional)</span></td>
                      <td><input type="text" name="first_nameReg"></td>
                    </tr>
                    <tr>
                      <td>Last Name <span style="color:#727272;">(optional):</span></td>
                      <td><input type="text" name="last_nameReg"></td>
                    </tr>
                    <tr>
                      <td>Email <span style="color:#727272;">(optional):</span></td>
                      <td><input type="email" name="emailReg"></td>
                    </tr>
                  </tbody>
                </table>
                <input type="submit" value="Register">
            </form>
        </div>
    </div>
</body>


