<?php
include 'core/functions.php';
include 'core/header.php';
new_log();
?>


<div class="container">
	<div class="row">

		<?php include 'nav.php'; ?>

		<div class="col-md-4">
			aa
		</div>

		<div class="col-md-8">				
			<form action="new_log.php" method="post">
				<div class="form-group">
					<?php

					if(isset($_POST['submit'])){
						echo "<div class='alert alert-success' role='alert'>
						<strong>Beeeng</strong>
						</div>";

					}
					?>
					<label for="title">Title</label>
					<input type="text" class="form-control" name="title">
				</div>
				<div class="form-group">
					<label for="content">Content</label>
					<textarea class="form-control" rows="3" name="content"></textarea>
				</div>
				
				<button type="submit" class="btn btn-default" name="submit">Submit</button>


			</form>
		</div>
	</div>
</div>


</body>
<html>