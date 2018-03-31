<?php
  ini_set('display_errors',1);
  error_reporting(E_ALL);

  function addgenre($name) {
    include('connect.php');
    $sanitize = mysqli_real_escape_string($link, $name);
    //Add to database
    $qstring = "INSERT INTO tbl_genre VALUES (NULL, '{$sanitize}', 1)";
    // echo $qstring;
    $result = mysqli_query($link, $qstring);
    if($result){
      $message = "New genre successfully inserted.";
      return $message;
    }
     else {
      $message = "There was an error. Try again later.";
      return $message;
    }
    mysqli_close($link);
  }
 ?>
