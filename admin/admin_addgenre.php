<?php
  require_once('phpscripts/config.php');



  if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $result = addgenre($name);
    $message = $result;
  }
  include('partials/header.php');
  ?>
  <div id="main-container">
    <h1 class="hidden">Login Panel</h1>
      <div class="container">
          <?php include('partials/nav.php'); ?>
          <div class="movies-section">
            <a href="admin_list.php?query=genre" class="backbtn">< BACK</a>
            <h5>Add a New Genre</h5>

            <div class="message">
              <?php if(!empty($message)){
                echo '<h3>'.$message.'</h3>';
              } ?>
            </div>
          <!-- DONT FORGET - Expects that there's something else than text > for photos -->
          <form action="admin_addgenre.php" method="post" enctype="multipart/form-data">

            <label>Genre Title:</label>
            <input type="text" name="name" value="">

            <input type="submit" id="submit" name="submit" value="SAVE">

          </form>
        </div>
      </div>
    </div>
  </body>
</html>
