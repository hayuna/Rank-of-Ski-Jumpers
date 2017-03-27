

<?php
include('config.php');
include('functions.php');
/*
V 	?show 	0 records - no results
V 	?show 	1-10 records - 1-10 pos
V 	?show 	>10 - pages
V 	?details&id= - show details about jumper
V 	?add - add form
V 	?modify&id= - modify form
V 	?delete&id= - delete record 
*/

if($_GET == NULL){
	show();
}

if(isset($_GET['show'])){
	show();
}

if(isset($_GET['delete'])){
	delete($_GET['id']);
}

if(isset($_GET['modify'])){
	modify($_GET['id']);
}	
	
if(isset($_GET['add'])){
	add();
}
if(isset($_GET['details'])){
	show_details($_GET['id']);
}

?>
