<?php
	include('config.php');
	$id = $_POST['id'];
	$name = $_POST['name'];
	$nationality = $_POST['nationality'];
	$age = $_POST['age'];
	$points = $_POST['points'];
	$query = mysql_query("UPDATE jumpers SET name = '".$name."', nationality = '".$nationality."', age = ".$age.", points = ".$points." WHERE id = ".$id);

?>