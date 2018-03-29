<?php
ini_set('display_errors',1);
error_reporting(E_ALL);
  require_once('admin/phpscripts/config.php');

  if(isset($_GET['filter'])){
    $tbl = "tbl_movies";
    $tbl2 = "tbl_genre";
    $tbl3 = "tbl_mov_genre";
    $col = "movies_id";
    $col2 = "genre_id";
    $col3 = "genre_name";
    $filter = $_GET['filter'];
    $getMovies = filterResults($tbl, $tbl2, $tbl3, $col, $col2, $col3, $filter);
  } else {
    $tbl = "tbl_movies";
    $getMovies = getAll($tbl);
    // echo $getMovies;
  }
  include('includes/header.php');
    ?>
    <body>
      <div id="main-container">
        <div id="container">
          <h1 class="hidden">Roku | Flashback Video App</h1>
            <?php include('includes/nav.php'); ?>
          
          <section class="movies-section">
            <h1>Welcome to the Endless Source of Online Fun</h1>
            <div id="movies">

              <?php
              if(!is_string($getMovies)){
                while($row = mysqli_fetch_array($getMovies)){
                  echo "<div class=\"cover\"><img src=\"public/images/{$row['movies_cover']}\" alt=\"{$row['movies_title']}\">
                  <h4>{$row['movies_title']}</h4>
                  <a href=\"details.php?id={$row['movies_id']}\">Read More</a></div>";
                }
              } else {
                echo "<p class=\"error\">{$getMovies}</p>";
              }
              ?>
            </div>
          </section>
        </div>
      </div>
  <?php
    include('includes/footer.php');
   ?>
