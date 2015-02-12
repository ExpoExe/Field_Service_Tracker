<?php
include 'core/init.php';
protect_page();
include 'includes/head.php'; 
	
foreach($_POST as $key=>&$value){
	if(empty($value)  === true){
		$value = 0;
	}
}	

$success = "";

if(isset($_GET['success']) && empty($_GET['success'])){
	$success = "Your data has been updated!";
}else{
	if(empty($_POST) === false && empty($errors) === true){
		$update_data = array(
			'hours_day' 			=> $_POST['hours'],
			'magazines_day' 		=> $_POST['magazines'],
			'tracts_day'			=> $_POST['tracts'],
			'brochures_day' 		=> $_POST['brochures'],
			'books_day' 			=> $_POST['books'],
			'rv_count_day' 			=> $_POST['rv_count'],
			'study_count_day' 		=> $_POST['study_count'],
			'other_hours_day' 		=> $_POST['other_hours'],
			'hours_month' 			=> $_POST['hours'],
			'magazines_month' 		=> $_POST['magazines'],
			'tracts_month'			=> $_POST['tracts'],
			'brochures_month' 		=> $_POST['brochures'],
			'books_month' 			=> $_POST['books'],
			'rv_count_month' 		=> $_POST['rv_count'],
			'study_count_month' 	=> $_POST['study_count'],
			'other_hours_month' 	=> $_POST['other_hours'],
			'hours_year' 			=> $_POST['hours'],
			'magazines_year' 		=> $_POST['magazines'],
			'tracts_year'			=> $_POST['tracts'],
			'brochures_year' 		=> $_POST['brochures'],
			'books_year' 			=> $_POST['books'],
			'rv_count_year' 		=> $_POST['rv_count'],
			'study_count_year' 		=> $_POST['study_count'],
			'other_hours_year' 		=> $_POST['other_hours'],
		);
		
		update($update_data);
		header('Location: main.php?success');
	}
	
}


?>

<link rel="stylesheet" media="handheld, screen and (max-width:1000px)" href="css/template_mobile.css">
<link rel="stylesheet" media="handheld, screen and (min-width:1001px)" href="css/template_desktop.css">

<div id="logout" onClick="location.href='logout.php'">LOGOUT</div>
<div style=" margin-bottom: 20px; clear:both;"></div>

<div id="newInput_container">
<h1>How Did Your Day Go?</h1>
<div id="newInput">
    <form name="update_data" method="post" action="main.php">
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
            </li>
            <li style="font-size:28px; text-decoration:underline; text-align:center;">Other Forms of Service</li>
            <li>
                <label for="other_hours">Hours: </label>
                <input type="number" name="other_hours">
            </li>
            </ol>
        </fieldset>
    </form>
    <div id="updates"> <?php echo $success; ?> </div>
    <div onClick="document.forms['update_data'].submit();" id="update_button">Update</div><br>
</div>
</div>

<?php include 'includes/stats.php'; ?>
    
</body>
</html>