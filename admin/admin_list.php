<?php
  ini_set('display_errors',1);
  error_reporting(E_ALL);

  require_once('phpscripts/config.php');
  if(isset($_GET['query'])){
    $dir = $_GET['query'];
    if($dir == "movies"){
      $tbl = "tbl_movies";
      $result = getAll($tbl);
      $back = "movie";
    } else if($dir == "genre"){
      $tbl = "tbl_genre";
      $genres = getAll($tbl);
      $back = "genre";
    }
  }

  include('partials/header.php');
  ?>
  <div id="main-container">
    <h1 class="hidden">Login Panel</h1>
      <div class="container">
          <?php include('partials/nav.php'); ?>
          <div class="movies-section">
            <div class="links">
              <a href="admin_index.php?<?php echo $back; ?>" class="backbtn">< BACK</a>
              <?php
                echo "<a href=\"admin_add".$back.".php\">Add New ".$back."</a>";
               ?>
            </div>
              <h5>List of <?php echo $dir; ?></h5>
              <ul>
              <?php
                if(isset($result) && !is_string($result)){
                  while($row = mysqli_fetch_array($result)){
                    echo "<li><h4>{$row['movies_title']}</h4><h4>{$row['movies_year']}</h4>
                    <a href=\"admin_edit_all.php?edit=movies&id={$row['movies_id']}\">Edit</a><a href=\"phpscripts/read.php?delete=movies&id={$row['movies_id']}\">Delete</a></li>";
                  }
                } else if(isset($genres) && !is_string($genres)){
                  while($row = mysqli_fetch_array($genres)){
                    echo "<li><h4>{$row['genre_name']}</h4>
                    <a href=\"admin_edit_all.php?edit=genre&id={$row['genre_id']}\">Edit</a><a href=\"phpscripts/read.php?delete=genre&id={$row['genre_id']}\">Delete</a></li>";
                  }
                } else {
                  echo "<p class=\"error\">{$result}</p>";
                }
               ?>
            </ul>
        </div>
      </div>
  </div>
  <?php include('partials/footer.php'); ?>
