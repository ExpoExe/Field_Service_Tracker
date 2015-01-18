<?php
include 'core/init.php';
protect_page();
include 'includes/head.php'; 

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
		?>
        <div onClick="location.href='main.php'" id="update_button">Have more to Update?</div><br>

</div>
</body>
</html>