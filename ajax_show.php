<?php
include('config.php');

$getName = "";
$getNationality = "";
$getAgeFrom = 0;
$getAgeTo = 999999;
$getPointsFrom = 0;
$getPointsTo = 9999999;

if(strlen($_GET['name'])>0)$getName = $_GET['name'];
if(strlen($_GET['nationality'])>0)$getNationality = $_GET['nationality'];
if(strlen($_GET['ageFrom'])>0)$getAgeFrom = $_GET['ageFrom'];
if(strlen($_GET['ageTo'])>0)$getAgeTo = $_GET['ageTo'];
if(strlen($_GET['pointsFrom'])>0)$getPointsFrom = $_GET['pointsFrom'];
if(strlen($_GET['pointsTo'])>0)$getPointsTo = $_GET['pointsTo'];




$query = "SELECT * FROM jumpers WHERE name like '%".$getName."%' and nationality like '%".$getNationality."%' and age between ".$getAgeFrom." and ".$getAgeTo." and points between ".$getPointsFrom." and ".$getPointsTo;

//echo $query;
show($query);




function show($ajaxQuery){
	$count = mysql_query($ajaxQuery." LIMIT 1");
	$r = mysql_fetch_array($count);
	if($r[0] == 0){
		echo '
		<div style="border:0;text-align: center;margin-top:166px;">No results</div>
		';
	}else{
		$query = mysql_query($ajaxQuery." ORDER BY points DESC");
		echo '
		<div style="overflow-y: scroll;overflow-x: hidden;height:297px;border: 0;">
		<table class="jumpersTable">
			<tr>
				<td>Position</td>
				<td>Name</td>
				<td>Nationality</td>
				<td>Age</td>
				<td>Points</td>
				<td>Action</td>
			</tr>
		';
		$counter = 0;
		while($r = mysql_fetch_assoc($query)){
			$id = $r['id'];
			$name = $r['name'];
			$nationality = $r['nationality'];
			$age = $r['age'];
			$points = $r['points'];
			$counter++;
			echo '
				<tr>
					<td>'.$counter.'</td>
					<td>'.$name.'</td>
					<td>'.$nationality.'</td>
					<td>'.$age.'</td>
					<td>'.$points.'</td>
					<td><a href="?modify&id='.$id.'">Modify</a> | <a href="?delete&id='.$id.'">Delete</a></td>
				</tr>
			';
		}
		echo '
		</table></div>
		';
	}

}
?>