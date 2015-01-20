<?php

include 'core/init.php';
include 'includes/head.php';

if(has_calls() === true){
	echo "Here they are";
}else{
	echo "Looks like no calls";
}

?>

<link rel="stylesheet" media="handheld, screen and (max-width:1000px)" href="css/template_mobile.css">
<link rel="stylesheet" media="handheld, screen and (min-width:1001px)" href="css/template_desktop.css">

<div id="logout" onClick="location.href='logout.php'">LOGOUT</div>
<div style=" margin-bottom: 20px; clear:both;"></div>

<header><div id="header">
	<h3 class="returnUpdate">Return to Records</h3><br><br>
	<h4 class="selectAdd1">Add a Return Visit</h4><br><br><h4 class="selectAdd2">Add a Bible Study</h4>
</div></header>

<div id="addCall">
	<h2>Add a Return Visit</h2>
    <form name="add_call" method="post" action="">
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
    <div onClick="document.forms['update_data'].submit();" id="update_button">+ Add Call</div><br>
</div>

<div id="addStudy">
	<h2>Add a Bible Study</h2>
    <form name="add_study" method="post" action="">
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
                <input type="datetime-local" name="study_time">
            </li>
            <li>
                <label for="study_notes">Notes: </label>
                <textarea name="study_notes" maxlength="3000"></textarea>
            </li>
            </ol>
        </fieldset>
    </form>
    <div onClick="document.forms['update_data'].submit();" id="update_button">+ Add Call</div><br>
</div>