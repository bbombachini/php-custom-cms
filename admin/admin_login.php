<?php
  require_once('phpscripts/config.php');
  $ip = $_SERVER['REMOTE_ADDR'];
  if(isset($_POST['submit'])){
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    if($username !== "" && $password !== "") {
      $result = logIn($username, $password, $ip);
      $message = $result;
    } else {
      $message = "Please fill out the required fields.";
    }
  }
  include('partials/header.php');
 ?>
  <div id="main-container">
    <h1 class="hidden">Login Panel</h1>
      <div class="container">
        <header>
          <img src="../public/images/roku.svg" alt="Roku Logo">
          <nav id="main-nav">
            <h1 class="hidden">Main Navigation</h1>
            <ul>
              <li><a href="#"><i class="ion-person"></i>Users</a></li>
              <li><a href="../index.php"><i class="ion-android-menu"></i>Menu</a></li>
            </ul>
          </nav>
        </header>
        <div class="movies-section">
          <h1 class="hidden">Content</h1>

          <h2 class="greeting">Welcome, log in to get started!</h2>
            <div class="message">
              <?php if(!empty($message)){
                echo '<h3>'.$message.'</h3>';
              } ?>
            </div>

            <form action="admin_login.php" method="post">
              <label>Username:</label>
              <input type="text" name="username" value="">
              <label>Password:</label>
              <input type="password" name="password" value="">
              <input type="submit" id="submit" name="submit" value="LOGIN">
            </form>
          </div>
      </div>
    </div>
  <?php include('partials/footer.php'); ?>
