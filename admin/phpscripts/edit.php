<?php
  include('connect.php');

  $tbl = $_POST['tbl'];
  $col = $_POST['col'];
  $id = $_POST['id'];
  $dest = str_replace("tbl_", "query=", $tbl);
  unset($_POST['tbl']);
  unset($_POST['col']);
  unset($_POST['id']);
  unset($_POST['submit']);

  // echo count($_POST);
  $count = 0;
  $num = count($_POST);

  $qstring = "UPDATE {$tbl} SET ";

  foreach($_POST as $key => $value) {
    $count++;
    if($count != $num){
      $qstring .= $key." = '".htmlspecialchars($value, ENT_QUOTES)."', ";
    } else {
      $qstring .= $key." = '".htmlspecialchars($value, ENT_QUOTES)."' ";
    }
  }

  $qstring .= "WHERE {$col}={$id}";
  // echo $qstring;
  $updatequery = mysqli_query($link, $qstring);
  if ($updatequery) {
    header("Location: ../admin_list.php?{$dest}");
  } else {
    echo "There was a problem changing this content. Contact your web admin.";
  }

  mysqli_close($link);
 ?>
