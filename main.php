<?php
include 'core/init.php';
protect_page();
include 'includes/head.php'; 

if(empty($_POST) === true){
	$_POST['hours'] = 0;
	$_POST['magazines'] = 0;
	$_POST['tracts'] = 0;
	$_POST['brochures'] = 0;
	$_POST['books'] = 0;
	$_POST['rv_count'] = 0;
	$_POST['study_count'] = 0;
	$_POST['other_hours_desc'] ="";
	$_POST['other_hours'] = 0;
}
	
foreach($_POST as $key=>&$value){
	if(empty($value)  === true){
		if($key === $_POST['other_hours_desc']){
			$value = "";
		}else{
			$value = 0;
		}
	}
}	
	
if(empty($errors) === true){
	$update_data = array(
		'hours_day' 			=> $_POST['hours'],
		'magazines_day' 		=> $_POST['magazines'],
		'tracts_day'			=> $_POST['tracts'],
		'brochures_day' 		=> $_POST['brochures'],
		'books_day' 			=> $_POST['books'],
		'rv_count_day' 			=> $_POST['rv_count'],
		'study_count_day' 		=> $_POST['study_count'],
		'other_hours_desc' 		=> $_POST['other_hours_desc'],
		'other_hours_day' 		=> $_POST['other_hours'],
	);
	
	update($update_data);
	
}


?>

<link rel="stylesheet" media="handheld, screen and (max-width:1000px)" href="css/template_mobile.css">
<link rel="stylesheet" media="handheld, screen and (min-width:1001px)" href="css/template_desktop.css">

<div id="logout" onClick="location.href='logout.php'">LOGOUT</div>
<div style=" margin-bottom: 20px; clear:both;"></div>

<div id="newInput_container">
	<h1>How Did Your Day Go?</h1>
    <div id="newInput">
    	<form name="update_data" method="post" action="">
        	<fieldset id="counter">
            	<legend></legend>
                <ol>
                <li>
                    <label for="hours">Hours: </label>
                    <input type="number" name="hours">
                </li>
                <li>
                    <label for="magazines">Magazines: </label>
                    <input type="number" name="magazines">
                </li>
                <li>
                    <label for="tracts">Tracts: </label>
                    <input type="number" name="tracts">
                </li>
                <li>
                    <label for="brochures">Brochures: </label>
                    <input type="number" name="brochures">
                </li>
                <li>
                    <label for="books">Books: </label>
                    <input type="number" name="books">
                </li>
                <li>
                    <label for="rv_count">Return Visits: </label>
                    <input type="number" name="rv_count">
                </li>
                <li>
                    <label for="study_count">Bible Studies: </label>
                    <input type="number" name="study_count">
                    <br><div onClick="location.href='callbook.php'" class="view_button">View Callbook</div>
                </li>
            	<li style="font-size:28px; text-decoration:underline;">Other Forms of Service</li>
                <li>
                    <label for="other_hours_desc">Description: </label>
                    <textarea name="other_hours_desc"></textarea>                
                </li>
                <li>
                    <label for="other_hours">Hours: </label>
                    <input type="number" name="other_hours">
                </li>
                </ol>
            </fieldset>
        </form>
        <div onClick="document.forms['update_data'].submit();" id="update_button">Update</div><br>
        <?php 
			if(empty($errors) === false){
				echo output_errors($errors);
			}
		?>
    </div>
</div>
</body>
</html>