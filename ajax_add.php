<?php
	include('config.php');
	$name = $_POST['name'];
	$nationality = $_POST['nationality'];
	$age = $_POST['age'];
	$points = $_POST['points'];
	$image = $_POST['image'];
	if(strlen($image)<1){$image = "img/default.png";}
	$query = mysql_query("INSERT INTO jumpers (id, name, nationality, age, points, img) VALUES (NULL, '".$name."', '".$nationality."', ".$age.", ".$points.", '".$image."')");
	?>
