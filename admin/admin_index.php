<?php
  require_once('phpscripts/config.php');
  confirm_logged_in();

  if($_SESSION['time'] >= 5 && $_SESSION['time'] <= 11 ){
    $greeting = "Have a full mug of coffee before start to work this morning!";
  } else if ($_SESSION['time'] >= 12 && $_SESSION['time'] <= 17) {
    $greeting = "Making small breaks and stretch frequently make you more productive in the afternoon!";
  } else if ($_SESSION['time'] >= 18 && $_SESSION['time'] <= 23) {
    $greeting = "What a long day ahn? Prioritize and finish tomorrow!";
  } else {
    $greeting = "Go home, seriously!";
  }
  include('partials/header.php');
 ?>
  <div id="main-container">
    <h1 class="hidden">Login Panel</h1>
      <div class="container">
          <?php include('partials/nav.php'); ?>
          <div class="movies-section">
            <?php echo '<h2 class="greeting">'.$greeting.'</h2>'; ?>
            <?php echo '<h2 class="greeting">Welcome, '.$_SESSION['user_name'].'</h2>'; ?><br>
            <?php echo '<h4>'.$_SESSION['last_login'].'</h4>'; ?>
            <?php if(!empty($_GET['message'])) {
                  $message = $_GET['message'];
                  echo '<div><h3>'.$message.'</h3></div>'; } ?>
            <h5>Movies Manager</h5>
            <div class="links">
              <a href="admin_list.php?query=movies"><p>Movies</p></a>
              <a href="admin_list.php?query=genre"><p>Genres</p></a>
            </div>
          </div>
      </div>
  </div>
<?php include('partials/footer.php'); ?>
