<?php
	include 'core/functions.php';
	include 'core/header.php';
?>


	<div class="container">
		<div class="row">

			<!-- NAV -->
			<?php include 'nav.php'; ?> 

			<div class="col-md-4">
				 <a href="new_log.php"class="btn btn-default btn-xs">New changelog</a>
			</div>

			<div class="col-md-8">				
				<?php
				show_log();
				?>
			</div>
		</div>
	</div>


</body>
<html>