
<link rel="Stylesheet" type="text/css" href="css/style.css"/> 
<?php
include('config.php');
/*
?show 	0 records - no results
?show 	1-10 records - 1-10 pos
?show 	>10 - pages
?details&id= - show details about jumper
?add - add form
?modify&id= - modify form
?delete&id= - delete record 
*/

if(isset($_GET['delete'])){
	$id = $_GET['id'];
	$query = mysql_query("DELETE FROM jumpers WHERE id = ".$id);
	header("Location: index.php");
}
if(isset($_GET['modify'])){
	$id = $_GET['id'];
	$query = mysql_query("SELECT * FROM jumpers WHERE id = ".$id);
	while($r = mysql_fetch_assoc($query)){
		$name = $r['name'];
		$nationality = $r['nationality'];
		$age = $r['age'];
		$points = $r['points'];
	}
?>


	<div class="addInput">
		<div class="input-margin">
			<input type="text" class="name" value="<?php echo $name; ?>"> Name<br>
		</div>
		<div class="input-margin">
			<input type="text" class="nationality" value="<?php echo $nationality; ?>"> Nationality<br>
		</div>
		<div class="input-margin">
			<input type="number" class="addAge" value="<?php echo $age; ?>"> Age<br>
		</div>
		<div class="input-margin">
			<input type="number" class="addPoints" value="<?php echo $points; ?>"> Points<br>
		</div>
		<div class="input-margin">
			<button style="width:100%">Modify jumper</button>
		</div>
	</div>



<?php
}
if(isset($_GET['add'])){
?>	
	
	
	<div class="addInput">
		<div class="input-margin">
			<input type="text" class="name"> Name<br>
		</div>
		<div class="input-margin">
			<input type="text" class="nationality"> Nationality<br>
		</div>
		<div class="input-margin">
			<input type="number" class="addAge"> Age<br>
		</div>
		<div class="input-margin">
			<input type="number" class="addPoints"> Points<br>
		</div>
		<div class="input-margin">
			<button style="width:100%">Add jumper</button>
		</div>
	</div>


<?php
}
if(isset($_GET['details'])){
	echo "details";
}

?>
<!--<table class="jumpersTable">
	<tr>
		<td>Position</td>
		<td>Name&nbsp;&nbsp;&nbsp;&nbsp;
			<div class="triangleUpToDown"></div>
			<div class="triangleDownToUp"></div>
		</td>
		<td>Nationality</td>
		<td>Points</td>
		<td>Action</td>
	</tr>
	<tr>
		<td>1</td>
		<td>Stoch Kamil</td>
		<td>Poland</td>
		<td>1595</td>
		<td>Modify | Delete</td>
	</tr>
	<tr>
		<td>2</td>
		<td>Kraft Stefan</td>
		<td>Austria</td>
		<td>1524</td>
		<td>Modify | Delete</td>
	</tr>
</table>
<div class="enumerate">
	<div class="trianglePrevious"></div>
	<div style="width:100px;float:left;border: 1px solid transparent;"></div>
	<div class="triangleNext"></div>
</div>-->