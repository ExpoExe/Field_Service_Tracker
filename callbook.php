<?php
/*
include 'core/init.php';
protect_page();
include 'includes/head.php';

$success = "";

if(!empty($_POST)){
	
	$rv_fields = array('rv_address', 'rv_notes');
	$study_fields = array('study_address', 'study_notes');
	
	foreach($_POST as $key=>$value){
		if(empty($value) && in_array($key, $rv_fields) === true){
			$errors[] = 'Please complete the required fields.';
			break 1;
		}
		if(empty($value) && in_array($key, $study_fields) === true){
			$errors[] = 'Please complete the required fields.';
			break 1;
		}
	}	
}

if(isset($_GET['success']) && empty($_GET['success'])){
	$success = "Your callbook has been updated!";
}else{
	
	if(empty($_POST) === false && empty($errors) === true){
		$callbook_data = array(
			'rv_name' 			=> $_POST['rv_name'],
			'rv_address' 		=> $_POST['rv_address'],
			'rv_time'			=> $_POST['rv_time'],
			'rv_notes' 			=> $_POST['rv_notes'],
			'study_name' 		=> $_POST['study_name'],
			'study_address' 	=> $_POST['study_address'],
			'study_time'		=> $_POST['study_time'],
			'study_appt' 		=> $_POST['study_appt'],
			'study_notes'		=> $_POST['study_notes']
		);
			
		update_callbook($callbook_data);

		//header('Location: callbook.php?success');
		//exit();
		
	}
}

?>

<link rel="stylesheet" media="handheld, screen and (max-width:1000px)" href="css/template_mobile.css">
<link rel="stylesheet" media="handheld, screen and (min-width:1001px)" href="css/template_desktop.css">

<div id="logout" onClick="location.href='logout.php'">LOGOUT</div>
<div style=" margin-bottom: 20px; clear:both;"></div>

<header><div id="header">
	<h3 class="returnUpdate">Return to Records</h3><br><br>
    <div id="errors">
    <?php
		output_errors($errors);
		if(has_calls() === true){
			echo "Here they are";
		}else{
			echo "It looks like your callbook is empty right now.  Try adding some calls!"; 
	}?>
    </div>
	<h4 class="selectAdd1">Add a Return Visit</h4><br><br><h4 class="selectAdd2">Add a Bible Study</h4>
</div></header>

<div id="addCall">
	<h2>Add a Return Visit</h2>
    <form name="add_call" method="post" action="callbook.php">
        <fieldset id="add">
            <legend></legend>
            <ol>
            <li>
                <label for="rv_name">Name: </label>
                <input type="text" name="rv_name">
            </li>
            <li>
                <label for="rv_address">Address: </label>
                <input type="text" name="rv_address">
            </li>
            <li>
                <label for="rv_time">Last Called On: </label>
                <input type="datetime-local" name="rv_time">
            </li>
            <li>
                <label for="rv_notes">Notes: </label>
                <textarea name="rv_notes" maxlength="3000"></textarea>
            </li>
            </ol>
        </fieldset>
    </form>
    <div onClick="document.forms['add_call'].submit();" id="update_button">+ Add Call</div><br>
</div>

<div id="addStudy">
	<h2>Add a Bible Study</h2>
    <form name="add_study" method="post" action="callbook.php">
        <fieldset id="add">
            <legend></legend>
            <ol>
            <li>
                <label for="study_name">Name: </label>
                <input type="text" name="study_name">
            </li>
            <li>
                <label for="study_address">Address: </label>
                <input type="text" name="study_address">
            </li>
            <li>
                <label for="study_time">Time Called On: </label>
                <input type="time" name="study_time">
            </li>
            <li>
                <label for="study_appt">Next Scheduled Appointment: </label>
                <input type="datetime-local" name="study_appt">
            </li>
            <li>
                <label for="study_notes">Notes: </label>
                <textarea name="study_notes" maxlength="3000"></textarea>
            </li>
            </ol>
        </fieldset>
    </form>
    <div onClick="document.forms['add_study'].submit();" id="update_button">+ Add Study</div><br>
</div>

<div id="callbook_container">

</div>
*/?>
Maybe one day...