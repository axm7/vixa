<?php
	$connection = mysqli_connect('localhost', 'root', '', 'MP3');
	if(!$connection) {
		die("Database not connected");
	}
?>