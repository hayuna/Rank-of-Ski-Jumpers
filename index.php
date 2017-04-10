<meta charset="UTF-8">

<link rel="Stylesheet" type="text/css" href="css/style.css"/>
<script src="js/jquery.js"></script>
<script>
	$(document).ready(function(){
		$('.modify_jumper_submit').click(function(){
			var id = $('.modifyInput > div > input.hideid').val();
			var name = $('.modifyInput > div > input.name').val();
			var nationality = $('.modifyInput > div > input.nationality').val();
			var age = $('.modifyInput > div > input.modifyAge').val();
			var points = $('.modifyInput > div > input.modifyPoints').val();
			var image = $('.modifyInput > div > input.modifyImage').val();
			$.ajax({
				method: "POST",
				url: "ajax_modify.php",
				data: {
					id: id,
					name: name,
					nationality: nationality,
					age: age,
					points: points,
					image: image
				}
			})
			.done(function( msg ) {
				location.replace("index.php");
				console.log(msg);
			});
		});
		$('.add_jumper_submit').click(function(){
			var name = $('.addInput > div > input.name').val();
			var nationality = $('.addInput > div > input.nationality').val();
			var age = $('.addInput > div > input.addAge').val();
			var points = $('.addInput > div > input.addPoints').val();
			var image = $('.addInput > div > input.addImage').val();
			$.ajax({
				method: "POST",
				url: "ajax_add.php",
				data: {
					name: name,
					nationality: nationality,
					age: age,
					points: points,
					image: image
				}
			})
			.done(function( msg ) {
				location.replace("index.php");
				console.log(msg);
			});
		});
		$('.addButton').click(function(){
			location.replace("?add");
		});
		$('.back').click(function(){
			location.replace("index.php");
		});
		$('.filterName, .filterNationality, .filterAgeFrom, .filterAgeTo, .filterPointsFrom, .filterPointsTo').on('keyup', function(){
			var name = $('.filterName').val();
			var nationality = $('.filterNationality').val();
			var ageFrom = $('.filterAgeFrom').val();
			var ageTo = $('.filterAgeTo').val();
			var pointsFrom = $('.filterPointsFrom').val();
			var pointsTo = $('.filterPointsTo').val();
        	$.ajax({
	            type: "GET",
	            url: "ajax_show.php",
	            data: {
	            	'name':name,
	            	'nationality':nationality,
	            	'ageFrom':ageFrom,
	            	'ageTo':ageTo,
	            	'pointsFrom':pointsFrom,
	            	'pointsTo':pointsTo
	            },
	            dataType: "html",
	            success: function(msg){
	              $('#content').html(msg);
	            },
	            error: function(msg){
	              console.log(msg);
	            }
            });
    	});
	});
</script>
<div id="container">
	<div id="header">
		<?php include('header.php'); ?>
	</div>
	<div id="middle">
		<div id="left">
			<?php include('filter.php'); ?>
		</div>
		<div id="content">
			<?php include('content.php'); ?>
		</div>
	</div>
	<div id="footer">
		<?php include('footer.php'); ?>
	</div>
</div>
