<?php
  require_once('phpscripts/config.php');
  include('partials/header.php');
  if(isset($_GET['edit'])){
    $dir = $_GET['edit'];
    if($dir == "movies"){
      $id = $_GET['id'];
      $tbl = "tbl_movies";
      $col = "movies_id";
      $back = "query=movies";
    }
    if($dir == "genre"){
      $id = $_GET['id'];
      $tbl = "tbl_genre";
      $col = "genre_id";
      $back = "query=genre";
    }
  }

  ?>
  <div id="main-container">
    <h1 class="hidden">Login Panel</h1>
      <div class="container">
          <?php include('partials/nav.php'); ?>
          <div class="movies-section">
            <a href="admin_list.php?<?php echo $back; ?>" class="backbtn">< BACK</a>
            <?php
              echo single_edit($tbl, $col, $id);
             ?>
           </div>
      </div>
  </div>
  <?php include('partials/footer.php'); ?>
