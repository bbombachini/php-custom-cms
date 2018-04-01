<?php
  ini_set('display_errors',1);
  error_reporting(E_ALL);

  require_once('functions.php');

  function addMovie($cover, $title, $year, $story, $trailer, $rating, $genre) {
    include('connect.php');
    if($cover['type'] == 'image/jpg' || $cover['type'] == 'image/jpeg'){
      $targetpath = "../public/images/{$cover['name']}";


      if(move_uploaded_file($cover['tmp_name'], $targetpath)){
        // echo "File transfer complete";
        $thumb_copy = "../public/images/thumb_{$cover['name']}";
        $size = getimagesize($targetpath);
        // echo $size[3];
        if($size[0] > 533 || $size[1] > 800){
          $img = resize_image($targetpath, 533, 800);
          $thumb = resize_image($targetpath, 208, 312);
        } else {
          $img = $targetpath;
          $thumb = resize_image($targetpath, 208, 312);
        }
        imagejpeg($img, $targetpath, 100);
        imagejpeg($thumb, "../public/images/thumb_{$cover['name']}", 80);
        //Add to database
        $qstring = "INSERT INTO tbl_movies VALUES (NULL, '{$title}', '{$cover['name']}', '{$year}', '{$story}', '{$trailer}', '{$rating}', 1)";
        // echo $qstring;
        $result = mysqli_query($link, $qstring);
        if($result){
          $qstring2 = "SELECT * FROM tbl_movies ORDER BY movies_id DESC LIMIT 1";
          $result2 = mysqli_query($link, $qstring2);
          $row = mysqli_fetch_array($result2);
          $lastId = $row['movies_id'];
          echo $lastId;
          $string3 = "INSERT INTO tbl_mov_gen VALUES(NULL, {$lastId}, {$genre})";
          $result3 = mysqli_query($link, $string3);
          if($result3){
            $message = "Movie inserted with success!";
            return $message;
          }
        }
      }
    } else {
      $message = "File type not allowed.";
      return $message;
    }
    mysqli_close($link);
  }




 ?>
