<?php
	include('config.php');
	$name = $_POST['name'];
	$nationality = $_POST['nationality'];
	$age = $_POST['age'];
	$points = $_POST['points'];
	$query = mysql_query("INSERT INTO jumpers (id, name, nationality, age, points) VALUES (NULL, '".$name."', '".$nationality."', ".$age.", ".$points.")");

?>