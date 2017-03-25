
<link rel="Stylesheet" type="text/css" href="css/style.css"/> 
<?php
include('config.php');
include('functions.php');
/*
X 	?show 	0 records - no results
X 	?show 	1-10 records - 1-10 pos
X 	?show 	>10 - pages
X 	?details&id= - show details about jumper
V 	?add - add form
V 	?modify&id= - modify form
V 	?delete&id= - delete record 
*/

if($_GET == NULL){
	defaults();
}

if(isset($_GET['show'])){
//SHOW//

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
