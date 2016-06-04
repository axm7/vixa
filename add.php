<?php
	include 'core/functions.php';
	include 'core/header.php';
	add_mp3();
?>


	<div class="container">
		<div class="row">

			<?php include 'nav.php'; ?>

			<div class="col-md-4">
				aa
			</div>

			<div class="col-md-8">				
				<form action="add.php" method="post">
				  <div class="form-group">
				  	<?php

				  		if(isset($_POST['submit'])){
				  			$song_name = $_POST['song_name'];
				  			$category = $_POST['category'];
				  			echo "<div class='alert alert-success' role='alert'>
				  			<strong>Thanks for new song! </strong><br />
				  			Name: <strong>$song_name</strong><br />
				  			Category: <strong>$category</strong>
				  			</div>";

				  		}

				  	?>
				    <label for="song_name">Song name</label>
				    <input type="text" class="form-control" name="song_name">
				  </div>
				  <div class="form-group">
				    <label for="url">Zippyshare URL</label>
				    <input type="text" class="form-control" name="url" placeholder="http://www71.zippyshare.com/v/S6xJLgox/file.html">
				  </div>

				  <div class="form-group">
				    <label for="author">Author</label>
				    <input type="text" class="form-control" name="author" placeholder="Twoj nick">
				  </div>

				  <div class="form-group">
				    <label for="category">Category</label>
				    <select class="form-control" name="category">
						  <option value="Electro house" name="category" id="category">Electro House</option>
						  <option value="House" name="category" id="category" >House</option>
						  <option value="Club/Dance" name="category" id="category" >Club / Dance</option>
						  <option value="Bigroom" name="category" id="category">Bigroom</option>
						  <option value="Trance" name="category" id="category">Trance</option>
						  <option value="Dubstep" name="category" id="category">Dubstep</option>
						</select>
				  </div>
				  <button type="submit" class="btn btn-default" name="submit">Submit</button>


				</form>
			</div>
		</div>
	</div>


</body>
<html>