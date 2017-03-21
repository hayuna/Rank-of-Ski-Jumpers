<script src="https://code.jquery.com/jquery-3.2.0.min.js"></script>



<br>
<div class="filter">filter results</div><hr>
	<div class="input-margin">
		<input type="text" class="name"> Name<br>
	</div>
	<div class="input-margin">
		<input type="text" class="nationality"> Nationality<br>
	</div>
	<div class="input-margin">
		<input type="text" class="ageFrom"> - <input type="text" class="AgeTo"> Age (from - to)<br>
	</div>
	<div class="input-margin">
		<input type="text" class="PointsFrom"> - <input type="text" class="PointsTo"> Points (from - to)<br>
	</div>
	<div class="input-margin">
	<hr>
	<button style="font-size: 20px;width: 100%;" class="addButton">Add jumpers</button>
</div>

<script>
	$('.addButton').click(function(){
		location.replace("?add");
	});
</script>