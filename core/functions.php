<?php
include 'core/db.php';

/* MP3 START */

function top5(){
	global $connection;

	$q = "SELECT * FROM `songs` ORDER BY id DESC LIMIT 5";
	$r = mysqli_query($connection, $q);

	if(mysqli_num_rows($r) > 0){
		while($row = mysqli_fetch_assoc($r)){

			$song_name = $row['name'];
			$id = $row['id'];

			echo "<ul>
					<li><a href='mp3.php?id=" . $id . "'>" . $song_name . "</a></li>
		  		</ul>";

		}
	}
}

function add_mp3(){

	global $connection;

	if(isset($_POST['submit'])){
		$song_name = $_POST['song_name'];
		$song_name = mysqli_real_escape_string($connection, $song_name);
		$url = $_POST['url'];

		$pattern = "/^(?:https?:\/\/)www([\d0-9-]+)\.[a-z]+\.[a-z\.]{2,6}\/v\/([a-z0-9\/\.].+)$/";
		preg_match($pattern, $url, $matches);
		list(, $server, $file) = $matches;
		$www = $server;
		$file = rtrim($file, "/file.html");
		$file = $file;

		$author = $_POST['author'];
		$category = $_POST['category'];

		$query = "INSERT INTO songs(name,url,www,file,author,category) VALUES ('$song_name', '$url', '$www', '$file', '$author', '$category')";
		$result = mysqli_query($connection, $query);

		if(!$result){
			die("NOPE");
		}
	}
}

function show_mp3(){

	global $connection;


	$wynik = "SELECT * FROM songs ORDER BY id DESC";
	$result = mysqli_query($connection, $wynik);

	if(mysqli_num_rows($result) > 0){
		while($row = mysqli_fetch_assoc($result)){

			$www = $row['www'];
			$file = $row['file'];
			$song_name = $row['name'];
			$download = $row['url'];
			$author = $row['author'];
			$cat = $row['category'];
			$id = $row['id'];

			echo "
			<div class='panel panel-default'>
			<div class='panel-heading'><span><a href='mp3.php?id=$id'>$song_name</a></span></div>
			<div class='panel-body'>
			<center><script type='text/javascript'>
			var zippywww='$www';
			var zippyfile='$file';
			var zippytext='#000000';
			var zippyback='#e8e8e8';
			var zippyplay='#ff6600';
			var zippywidth=700;
			var zippyauto=false;
			var zippyvol=100;
			var zippywave = '#000000';
			var zippyborder = '#cccccc';
			</script>
			<script type='text/javascript' src='http://api.zippyshare.com/api/embed_new.js'>
			</script>
			<small>Author: <strong>$author</strong> | Category: <strong><a href='index.php?category=" . $cat . "'>" . $cat . "</a></strong> | <strong><a href='$download' target='_blank'>Download</a></strong></small></center>
			</div>
			</div>";

		}
	}
}

function single_mp3(){

	global $connection;

	$query = "SELECT id,name,www,url,file,author,category FROM songs WHERE id = " . $_GET['id'];
	$result = mysqli_query($connection,$query);


	if ($row = mysqli_fetch_assoc($result)) {
		$www = $row['www'];
		$file = $row['file'];
		$song_name = $row['name'];
		$download = $row['url'];
		$author = $row['author'];
		$cat = $row['category'];
		$id = $row['id'];

		echo "
		<div class='panel panel-default'>
		<div class='panel-heading'><span>$song_name</span></div>
		<div class='panel-body'>
		<center><script type='text/javascript'>
		var zippywww='$www';
		var zippyfile='$file';
		var zippytext='#000000';
		var zippyback='#e8e8e8';
		var zippyplay='#ff6600';
		var zippywidth=700;
		var zippyauto=false;
		var zippyvol=100;
		var zippywave = '#000000';
		var zippyborder = '#cccccc';
		</script>
		<script type='text/javascript' src='http://api.zippyshare.com/api/embed_new.js'>
		</script>
		<small>Author: <strong>$author</strong> | Category: <strong><a href='index.php?category=" . $cat . "'>" . $cat . "</a></strong> | <strong><a href='$download' target='_blank'>Download</a></strong></small></center>
		</div>
		</div>";
	}	
}

/* END MP3 */

function show_category($category){

	global $connection;


	$query = "SELECT category FROM songs GROUP BY category";
	$result = mysqli_query($connection, $query);

	if(mysqli_num_rows($result) > 0){
		while($row = mysqli_fetch_assoc($result)){
			$category = $row['category'];

			
			echo "<li><a href='index.php?category=" . $category . "'>" . $category . "</a></li>";
			
		}
	}
}


function category($category){
	global $connection;

	$query = "SELECT * FROM songs WHERE category = '$category'";
	$r = mysqli_query($connection, $query);

	if(mysqli_num_rows($r) > 0){
		while($row = mysqli_fetch_assoc($r)){

			$www = $row['www'];
			$file = $row['file'];
			$song_name = $row['name'];
			$download = $row['url'];
			$author = $row['author'];
			$cat = $row['category'];
			$id = $row['id'];

			echo "
			<div class='panel panel-default'>
			<div class='panel-heading'><span><a href='mp3.php?id=$id'>$song_name</a></span></div>
			<div class='panel-body '>
			<center><script type='text/javascript'>
			var zippywww='$www';
			var zippyfile='$file';
			var zippytext='#000000';
			var zippyback='#e8e8e8';
			var zippyplay='#ff6600';
			var zippywidth=700;
			var zippyauto=false;
			var zippyvol=100;
			var zippywave = '#000000';
			var zippyborder = '#cccccc';
			</script>
			<script type='text/javascript' src='http://api.zippyshare.com/api/embed_new.js'>
			</script>
			<small>Author: <strong>$author</strong> | Category: <strong><a href='index.php?category=" . $cat . "'>" . $cat . "</a></strong> | <strong><a href='$download' target='_blank'>Download</a></strong></small></center>
			</div>
			</div>";

		}
	}
}


function new_log(){
	global $connection;

	if(isset($_POST['submit'])){
		$title = $_POST['title'];
		$title = mysqli_real_escape_string($connection, $title);
		$content = $_POST['content'];
		$author = "zog";

		$query = "INSERT INTO log(log_title,log_content,log_author) VALUES ('$title', '$content', '$author')";
		$result = mysqli_query($connection, $query);

		if(!$result){
			die("NOPE");
		}
	}
}

function show_log(){

	global $connection;

	$log = "SELECT * FROM log ORDER BY id DESC";
	$result = mysqli_query($connection,$log);

	if(mysqli_num_rows($result) > 0){
		while($row = mysqli_fetch_assoc($result)){
			$id = $row['id'];
			$title = $row['log_title'];
			$content = $row['log_content'];
			$author = $row['log_author'];
			$date = $row['log_date'];

			echo "
			<div class='panel panel-default'>
			<div class='panel-heading'><span><strong>$title</strong></span></div>
			<div class='panel-body'>
			$content
			</div>
			<center><small>Date: $date | by: <strong>$author</strong></small></center>
			</div>";
		}
	}
}
?>