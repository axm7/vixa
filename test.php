<?php

include 'core/db.php';

function show_category($category){

	global $connection;


	$wynik = "SELECT category FROM `songs` GROUP BY category";
	$result = mysqli_query($connection, $wynik);

	if(mysqli_num_rows($result) > 0){
		while($row = mysqli_fetch_assoc($result)){
			$category = $row['category'];

			
			echo "<li><a href='?catrgory=" . $category . "'>" . $category . "</a></li>";
			
		}
	}
}

show_category($_GET['category']);


?>
