<?php
  require_once('phpscripts/config.php');

  $tbl = "tbl_genre";
  $genQuery = getAll($tbl);

  if(isset($_POST['submit'])){
    $cover = $_FILES['file'];
    $title = $_POST['title'];
    $year = $_POST['year'];
    $run = $_POST['runtime'];
    $story = $_POST['storyline'];
    $trailer = $_POST['trailer'];
    $release = $_POST['release'];
    $genre = $_POST['genList'];
    $result = addMovie($cover, $title, $year, $run, $story, $trailer, $release, $genre);
    $message = $result;
  }
  include('partials/header.php');
  ?>
  <div id="main-container">
    <h1 class="hidden">Login Panel</h1>
      <div class="container">
          <?php include('partials/nav.php'); ?>
          <div class="movies-section">
            <a href="admin_list.php?query=movies" class="backbtn">< BACK</a>
            <h5>Add a New Movie</h5>

            <div class="message">
              <?php if(!empty($message)){
                echo '<h3>'.$message.'</h3>';
              } ?>
            </div>
          <!-- DONT FORGET - Expects that there's something else than text > for photos -->
          <form action="admin_addmovie.php" method="post" enctype="multipart/form-data">
            <label>Cover Image:</label>
            <input type="file" name="file" value="">
            <br>
            <label>Movie Title:</label>
            <input type="text" name="title" value="">
            <br><br>
            <label>Movie Year:</label>
            <input type="text" name="year" value="">
            <br><br>
            <label>Movie Runtime:</label>
            <input type="text" name="runtime" value="">
            <br><br>
            <label>Movie Storyline:</label>
            <input type="text" name="storyline" value="">
            <br><br>
            <label>Movie Trailer:</label>
            <input type="text" name="trailer" value="">
            <br><br>
            <label>Movie Release:</label>
            <input type="text" name="release" value="">
            <br><br>
            <select name="genList">
              <option>Please select a movie genre...</option>
              <?php
                while($row = mysqli_fetch_array($genQuery)){
                  echo "<option value=\"{$row['genre_id']}\">{$row['genre_name']}</option>";
                }
               ?>
            </select>
            <input type="submit" id="submit" name="submit" value="SAVE">

          </form>
        </div>
      </div>
    </div>
  </body>
</html>
