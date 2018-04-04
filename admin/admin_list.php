<?php
  ini_set('display_errors',1);
  error_reporting(E_ALL);

  require_once('phpscripts/config.php');
  if(isset($_GET['query'])){
    $dir = $_GET['query'];
    if($dir == "movies"){
      $tbl = "tbl_movies";
      $back = "movie";
    } else if($dir == "genre"){
      $tbl = "tbl_genre";
      $back = "genre";
    }
    $result = getAll($tbl);
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
              <div class="message">
                <?php if(!empty($message)){
                  echo '<h3>'.$message.'</h3>';
                } ?>
              </div>
              <ul>
              <?php
              if(isset($result) && !is_string($result)){
                while($row = mysqli_fetch_array($result, MYSQLI_NUM)){
                  echo "<li><h4>{$row[1]}</h4>
                  <a href=\"admin_edit_all.php?edit={$dir}&id={$row[0]}\">Edit</a><a href=\"phpscripts/read.php?delete={$dir}&id={$row[0]}\">Delete</a></li>";
                }
              }
                else {
                  echo "<p class=\"error\">{$result}</p>";
                }
               ?>
            </ul>
        </div>
      </div>
  </div>
  <?php include('partials/footer.php'); ?>
