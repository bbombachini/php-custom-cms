<?php
  require_once('phpscripts/config.php');
  include('partials/header.php');
  if(isset($_GET['id'])){
    $id = $_GET['id'];
  }
  ?>
  <div id="main-container">
    <h1 class="hidden">Login Panel</h1>
      <div class="container">
          <?php include('partials/nav.php'); ?>
          <div class="movies-section">
            <a href="admin_list.php" class="backbtn">< BACK</a>
            <?php
              $tbl = "tbl_movies";
              $col = "movies_id";
              echo single_edit($tbl, $col, $id);

             ?>
           </div>
      </div>
  </div>
  <?php include('partials/footer.php'); ?>
