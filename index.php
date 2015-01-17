
<?php 
include 'core/init.php';
require 'core/database/connect.php';
include 'includes/head.php'; 
?>

<!-- What to do 

	1) Hours in Field Service
    2) Placement Tracker
    	Magazines, tracts, brochures, books, etc.
    3) Return Visits
    	Where, when, description, material covered, scheduled appt
    4) Bible Studies
    	Householder details, material covered previously, material planned for next visit, scheduled appt date and time
    5) Other forms of Sacred Service
    	RBC, HLC, Congregation responsibilities, etc.

-->

<body>
	<div id="intro">
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
            <span id="register_here" class="fake-link">Register</span></p>
            <form id="registration_form" name="register">
            	<table border="0">
                  <tbody>
                    <tr>
                      <td>Username:</td>
                      <td><input type="text" name="usernameReg"></td>
                    </tr>
                    <tr>
                      <td>Password:</td>
                      <td><input type="text" name="passwordReg"></td>
                    </tr>
                    <tr>
                      <td>Email: <span style="color:#727272;">(optional)</span></td>
                      <td><input type="email" name="emailReg"></td>
                    </tr>
                  </tbody>
				</table>
                <input type="submit" value="Register" name="submitReg">
            </form>
        </div>
    </div>
</body>
</html>
