<?php
	require_once('admin/phpscripts/config.php');
	if(isset($_GET['id'])) {
		$tbl = "tbl_movies";
		$col = "movies_id";
		$id = $_GET['id'];
		$getMovie = getSingle($tbl, $col, $id);
		}
	include('includes/header.php');
	    ?>
	    <body>
	      <div id="main-container">
					<div id="container">
						<h1 class="hidden">Roku | Flashback Video App</h1>
						 <?php include('includes/nav.php'); ?>
	        		<section class="movies-section">
								<div class="two-columns">
									<?php
										if(!is_string($getMovie)) {
											$row = mysqli_fetch_array($getMovie);
											echo "<div>
											<img src=\"public/images/{$row['movies_cover']}\" alt=\"{$row['movies_title']}\">
											</div>
											<div>
											<h3>{$row['movies_title']}</h3>
											<h5>{$row['movies_year']}</h5>
											<p>{$row['movies_storyline']}</p>
											<a href=\"index.php\">Go Back</a>
											</div>";
										} else {
											echo "<p>{$getMovie}</p>";
										}
										?>
								</div>
							</section>
					</div>
			 </div>
		<?php include('includes/footer.php'); ?>
