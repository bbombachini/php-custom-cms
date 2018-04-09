<?php
  ini_set('display_errors',1);
  error_reporting(E_ALL);

  require_once('admin/phpscripts/config.php');

  $genFilter = "tbl_genre";
  $genQuery = getAll($genFilter);

  if(isset($_POST['submit'])){
    $tbl = "tbl_movies";
    $tbl2 = "tbl_genre";
    $tbl3 = "tbl_mov_gen";
    $col = "movies_id";
    $col2 = "genre_id";
    $col3 = "genre_name";
    $filter = $_POST['select'];
    if($filter !== "All genres..."){
      $getMovies = filterResults($tbl, $tbl2, $tbl3, $col, $col2, $col3, $filter);
    }else{
      $tbl = "tbl_movies";
      $getMovies = getAll($tbl);
    }
  } else {
    $tbl = "tbl_movies";
    $getMovies = getAll($tbl);
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
                <form id="filter" method="post">
                  <label for="input">Select category:</label>
                    <select name="select">
                      <option>All genres...</option>
                      <?php
                        while($row = mysqli_fetch_array($genQuery)){
                          echo "<option value=\"{$row['genre_name']}\">{$row['genre_name']}</option>";
                        }
                       ?>
                    </select>
                    <input class="" type="submit" name="submit" value="GO">
                </form>
              <div id="movies">
                <?php
                if(!is_string($getMovies)){
                  while($row = mysqli_fetch_array($getMovies)){
                    echo "<div class=\"cover\"><img src=\"public/images/{$row['movies_cover']}\" alt=\"{$row['movies_title']}\">
                    <a href=\"details.php?id={$row['movies_id']}\">{$row['movies_title']}</a>
                    </div>";
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
