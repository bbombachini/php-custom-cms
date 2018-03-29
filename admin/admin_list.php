<?php
  require_once('phpscripts/config.php');
  $tbl = "tbl_movies";
  $result = getAll($tbl);

  include('partials/header.php');
  ?>
  <div id="main-container">
    <h1 class="hidden">Login Panel</h1>
      <div class="container">
          <?php include('partials/nav.php'); ?>
          <div class="movies-section">
            <a href="admin_list.php" class="backbtn">< BACK</a>
              <ul>
              <?php
                if(!is_string($result)){
                  while($row = mysqli_fetch_array($result)){
                    echo "<li><h4>{$row['movies_title']}</h4><h4>{$row['movies_year']}</h4>
                    <a href=\"admin_edit_all.php?id={$row['movies_id']}\">Edit</a></li>";
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
