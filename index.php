<?php
include 'core/functions.php';
include 'core/header.php';
?>


<div class="container">
	<div class="row">

<<<<<<< Updated upstream
		<!-- NAV -->
		<?php include 'nav.php'; ?> 

		<div class="col-md-4">
			<ul>
               
			    <?php 
               
                show_category($_GET['category']);
                
                ?>
			</ul>
		</div>

		<div class="col-md-8">				
			<?php

			if (isset($_GET['category'])) { 	// Jeżeli jest ustawione strona.pl/index.php?CATEGORY=

				$category = $_GET['category'];  // Podpinam odpowiedź z GET'a czyli nazwę kategorii Bigroom, House itp

				echo "<ol class='breadcrumb'> 
				<li><a href='index.php'>vixa.io</a></li>
				<li>" . $category. "</li>
				</ol>";							// To jest zwykła 'historia gdzie jesteś'     									

				category($_GET['category']); 	// Pobiera KATEGORIĘ z adresu URL np Bigroom i zapisuje ją w funkcji

			}else{
				show_mp3();
			}
			?>
		</div>
	</div>

<?php include 'footer.php'; ?>
=======
	<p>SIEMA ; D</p>

	I am going to sleep now.
</body>
</html>
>>>>>>> Stashed changes
