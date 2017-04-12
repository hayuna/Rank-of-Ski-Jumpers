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
		$image = $r['img'];
	}
	echo '
	<div class="info">
		<div class="avatar" style="background: url(\''.$image.'\');background-size: 250px 250px;background-repeat: no-repeat;height: 250px;float: left;width: 250px;"></div>
			<div class="modifyInput">
				<div class="input-margin">
					<input class="hideid" type="hidden" value="'.$id.'">
					<input class="name" style="width:166px;" value="'.$name.'"> Name<br>
				</div>
				<div class="input-margin">
					<input class="nationality" style="width:166px;" value="'.$nationality.'"> Nationality<br>
				</div>
				<div class="input-margin">
					<input type="number" class="modifyAge" value="'.$age.'"> Age<br>
				</div>
				<div class="input-margin">
					<input type="number" class="modifyPoints" value="'.$points.'"> Points<br>
				</div>
				<div class="input-margin">
					<input class="modifyImage" type="text" value="'.$image.'"> Link to new image<br>
				</div>
				<div class="input-margin" style="border:none;">
					<button class="modify_jumper_submit" style="width:100%;border-radius:20px;">Modify jumper</button>
				</div>
			</div>
	</div>
	';
}



function add(){
	echo '
	<div class="addInput">
		<div class="input-margin">
			<input type="text" class="name" style="width:166px;"> Name<br>
		</div>
		<div class="input-margin">
			<input type="text" class="nationality" style="width:166px;"> Nationality<br>
		</div>
		<div class="input-margin">
			<input type="number" class="addAge"> Age<br>
		</div>
		<div class="input-margin">
			<input type="number" class="addPoints"> Points<br>
		</div>
		<div class="input-margin">
			<input class="addImage" type="text"> Link to image<br>
		</div>
		<div class="input-margin" style="border:none;">
			<button class="add_jumper_submit" style="width:100%;border-radius:20px;">Add jumper</button>
		</div>
	</div>
	';
}

function show_details($id){
	$query = mysql_query("SELECT * FROM jumpers WHERE id = ".$id);
	while($r = mysql_fetch_assoc($query)){
		$name = $r['name'];
		$nationality = $r['nationality'];
		$age = $r['age'];
		$points = $r['points'];
		$img = $r['img'];
	}
	echo '
	<div class="details-body">
		<div class="avatar" style="background: url(\''.$img.'\');background-size: 152px 152px;background-repeat: no-repeat;height: 150px;float: left;width: 150px;"></div>
		<div class="info">
				<div class="details-margin">
					'.$name.'
				</div>
				<div class="details-margin">
					Nationality: '.$nationality.'
				</div>
				<div class="details-margin">
					Age: '.$age.'
				</div>
				<div class="details-margin">
					Points: '.$points.'
				</div>
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
	}else{
		$query = mysql_query("SELECT * FROM jumpers ORDER BY points DESC");
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
					<td><a href="?details&id='.$id.'">'.$name.'</a></td>
					<td>'.$nationality.'</td>
					<td>'.$age.'</td>
					<td>'.$points.'</td>
					<td><a class="linkButton" href="?modify&id='.$id.'">Modify</a> | <a class="linkButton" href="?delete&id='.$id.'">Delete</a></td>
				</tr>
			';
		}
		echo '
		</table></div>
		';
	}

}
?>
