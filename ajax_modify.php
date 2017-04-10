<?php
	include('config.php');
	$id = $_POST['id'];
	$name = $_POST['name'];
	$nationality = $_POST['nationality'];
	$age = $_POST['age'];
	$points = $_POST['points'];
	$image = $_POST['image'];
	$query = mysql_query("UPDATE jumpers SET name = '".$name."', nationality = '".$nationality."', age = ".$age.", points = ".$points.", img = '".$image."' WHERE id = ".$id);

?>
