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
			$.ajax({
				method: "POST",
				url: "ajax_modify.php",
				data: { 
					id: id,
					name: name, 
					nationality: nationality,
					age: age,
					points: points
				}
			})
			.done(function( msg ) {
				location.replace("index.php");
			});
		});
		$('.add_jumper_submit').click(function(){
			var name = $('.addInput > div > input.name').val();
			var nationality = $('.addInput > div > input.nationality').val();
			var age = $('.addInput > div > input.addAge').val();
			var points = $('.addInput > div > input.addPoints').val();
			$.ajax({
				method: "POST",
				url: "ajax_add.php",
				data: { 
					name: name, 
					nationality: nationality,
					age: age,
					points: points
				}
			})
			.done(function( msg ) {
				location.replace("index.php");
			});
		});
		$('.addButton').click(function(){
			location.replace("?add");
		});
		$("td").not(':eq(5)').click(function() {
			var id = $(this).parent("tr");
			id = id.find("td:eq(5)").html();
			id = id.replace('<a href="?modify&amp;id=', '');
			id = id.replace('">Modify</a> | <a href="?delete&amp;id=', '');
			id = id.replace('">Delete</a>', '');
			id = id.substr(0, id.length/2);
			location.replace("?details&id="+id);
        });
		$('.back').click(function(){
			location.replace("index.php");
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