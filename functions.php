<?php
function delete($id){
	$query = mysql_query("DELETE FROM jumpers WHERE id = ".$id);
	header("Location: index.php");
}	

function modify($id){
	$query = mysql_query("SELECT * FROM jumpers WHERE id = ".$id);
	while($r = mysql_fetch_assoc($query)){
		$name = $r['name'];
		$nationality = $r['nationality'];
		$age = $r['age'];
		$points = $r['points'];
	}
	echo '
	<div class="modifyInput">
		<div class="input-margin">
			<input class="hideid" type="hidden" value="'.$id.'">
			<input class="name" value="'.$name.'"> Name<br>
		</div>
		<div class="input-margin">
			<input class="nationality" value="'.$nationality.'"> Nationality<br>
		</div>
		<div class="input-margin">
			<input type="number" class="modifyAge" value="'.$age.'"> Age<br>
		</div>
		<div class="input-margin">
			<input type="number" class="modifyPoints" value="'.$points.'"> Points<br>
		</div>
		<div class="input-margin">
			<button class="modify_jumper_submit" style="width:100%">Modify jumper</button>
		</div>
	</div>
	';
}



function add(){
	echo '
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
			<button class="add_jumper_submit" style="width:100%">Add jumper</button>
		</div>
	</div>
	';
}	

function show_details($id){
	echo '
	<div class="details-body">
		<div class="avatar" style="background: url(\'img/default.png\');height: 150px;float: left;width: 150px;"></div>
		<div class="info">
			<div class="details-margin">
				xxxx xxxxxxxxxxxxxxxxx xxxxxxxxxxxxxx
			</div>
			<div class="details-margin">
				Nationality: xxxxxxxxx
			</div>
			<div class="details-margin">
				Age: xx
			</div>
			<div class="details-margin">
				Points: xxxx
			</div>
		</div>
	</div>
	';
}

function show(){
	$count = mysql_query("SELECT count(*) as count FROM jumpers LIMIT 1");
	$r = mysql_fetch_array($count);
	if($r[0] == 0){
		echo '
		<div style="border:0;text-align: center;margin-top:166px;">No results</div>
		';
	}
	else if($r[0] <= 10){
		$query = mysql_query("SELECT * FROM jumpers ORDER BY points DESC LIMIT 10");
		echo '
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
		</table>
		';
	}else{
		echo "more than 10";
	}

}
?>