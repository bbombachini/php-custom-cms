<?php
  require_once('phpscripts/config.php');

  $tbl = "tbl_genre";
  $genQuery = getAll($tbl);
  $errors = array();

  if(isset($_POST['submit'])){
    $cover = $_FILES['cover'];
    $title = $_POST['title'];
    $year = $_POST['year'];
    $story = $_POST['storyline'];
    $trailer = $_FILES['trailer'];
    $rating = $_POST['rating'];
    $genre = $_POST['genre'];
    if($cover !== "" && $title!== "" && $year!== "" && $story!== "" && $trailer !== "" && $rating !== "" && $genre !== "") {
      $result = addMovie($cover, $title, $year, $story, $trailer, $rating, $genre);
      $message = $result;
    }
    else {
      $message = "Please fill all fields.";
    }
    $required = array( "title", "year", "storyline", "rating", "genre");
      foreach ($required as $require) {
        $value = trim($_POST[$require]);
        if(!has_value($value)){
          $errors[$require] = ucfirst($require)." cannot be blank.";
        }
      }

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
                echo "<h3 class=\"greeting\">".$message."</h3>";
              } ?>
            </div>

            <?php
            echo "<div class=\"error\">".form_errors($errors)."</div>";
           ?>

            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" enctype="multipart/form-data">
              <label>Cover Image:</label>
              <input type="file" name="cover" value="">
              <br>
              <label>Movie Title:</label>
              <input type="text" name="title" value="">
              <br><br>
              <label>Movie Year:</label>
              <input type="text" name="year" value="">
              <br><br>
              <label>Movie Storyline:</label>
              <input type="textarea" name="storyline" value="">
              <br><br>
              <label>Movie Trailer:</label>
              <input type="file" name="trailer" value="">
              <br><br>
              <label>Movie Rating: (from 0 to 10)</label>
              <input type="text" name="rating" value="">
              <br><br>
              <select name="genre">
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
