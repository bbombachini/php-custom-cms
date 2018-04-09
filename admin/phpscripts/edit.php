<?php
  ini_set('display_errors',1);
  error_reporting(E_ALL);

  include('connect.php');
  require_once('functions.php');
  require_once('read.php');

  if(isset($_POST['submit'])){
    $tbl = $_POST['tbl'];
    $col = $_POST['col'];
    $id = $_POST['id'];
    $qstring = "UPDATE {$tbl} SET ";
    $movieFile = $_FILES['movies_trailer'];
    $imageFile = $_FILES['movies_cover'];

    if(isset($movieFile)){
      if($movieFile['type'] == "video/mp4"){
        $videopath = "../../public/videos/{$movieFile['name']}";
        if(move_uploaded_file($movieFile['tmp_name'], $videopath)){
          $qstring .= "movies_trailer = '{$movieFile['name']}', ";
        }
      }
    }

    if(isset($imageFile)){
      if($imageFile['type'] == 'image/jpg' || $imageFile['type'] == 'image/jpeg' ){
        $targetpath = "../../public/images/{$imageFile['name']}";
        if(move_uploaded_file($imageFile['tmp_name'], $targetpath)){
          $thumb_copy = "../../public/images/thumb_{$imageFile['name']}";
          $size = getimagesize($targetpath);
          if($size[0] > 533 || $size[1] > 800){
            $img = resize_image($targetpath, 533, 800);
            $thumb = resize_image($targetpath, 208, 312);
            imagejpeg($img, $targetpath, 100);
          } else {
            // $img = $targetpath;
            $thumb = resize_image($targetpath, 208, 312);
          }
          imagejpeg($thumb, "../../public/images/thumb_{$imageFile['name']}", 80);
          $qstring .= "movies_cover = '{$imageFile['name']}', ";
        }
      }
    }
    if( isset($_POST['genres']) && is_array($_POST['genres']) ) {
      $tbl4 = "tbl_mov_gen";
      $col4 = "movies_id";
      $delete = deleteItem($tbl4, $col4, $id);
      foreach($_POST['genres'] as $genres) {
        $genUpdate = "INSERT INTO {$tbl4} VALUES(NULL, {$id}, {$genres});";
        // echo $genUpdate;
        $genResult = mysqli_query($link, $genUpdate);
      }
    }
  }
  $dest = str_replace("tbl_", "query=", $tbl);
  unset($_POST['tbl']);
  unset($_POST['col']);
  unset($_POST['id']);
  unset($_POST['submit']);
  unset($_POST['genres']);

  $count = 0;
  $num = count($_POST);
  foreach($_POST as $key => $value) {
    $count++;
    if($count != $num){
      $qstring .= $key." = '".htmlspecialchars($value, ENT_QUOTES)."', ";
    } else {
      $qstring .= $key." = '".htmlspecialchars($value, ENT_QUOTES)."' ";
    }
  }
  $qstring .= "WHERE {$col}={$id};";
  // echo $qstring;
  $updatequery = mysqli_query($link, $qstring);
  if ($updatequery) {
    header("Location: ../admin_list.php?{$dest}");
  } else {
    echo "There was a problem changing this content. Contact your web admin.";
  }

  mysqli_close($link);
 ?>
