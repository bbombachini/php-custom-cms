<?php
  // include('config.php');
  function single_edit($tbl, $col, $id){

    $result = getSingle($tbl, $col, $id);
    $getResult = mysqli_fetch_array($result);
    echo "<h4 class=\"title-edit\">{$getResult[1]}</h4>";
    echo "<form action=\"".htmlspecialchars('phpscripts/edit.php')."\" method=\"post\" enctype=\"multipart/form-data\">";

    echo "<input hidden name=\"tbl\" value=\"{$tbl}\">";
    echo "<input hidden name=\"col\" value=\"{$col}\">";
    echo "<input hidden name=\"id\" value=\"{$id}\">";

    for($i=0; $i < mysqli_num_fields($result)-1; $i++) {
      $dataType = mysqli_fetch_field_direct($result, $i);
      $fieldName = $dataType->name;
      $fieldLabel = str_replace("_", " ", $fieldName);
      $fieldType = $dataType->type;
      if($fieldName != $col && substr($fieldName, -2) != "id"){
        echo "<label>{$fieldLabel}</label>";
        if(substr($getResult[$i], -3) == "jpg"){
          echo "<div class=\"cover-image\"><img src=\"../public/images/$getResult[$i]\"></div>";
          echo "<input type=\"file\" name=\"{$fieldName}\" value=\"\"></input><br>";
        }
        else if(substr($getResult[$i], -3) == "mp4"){
          echo "<input type=\"file\" name=\"{$fieldName}\" value=\"\"></input><br>";
        }
        else if($fieldType != "252"){
          echo "<input type=\"text\" name=\"{$fieldName}\" value=\"{$getResult[$i]}\"></input><br>";
        } else {
          echo "<textarea name=\"{$fieldName}\">{$getResult[$i]}</textarea><br>";
        }
      }
    }
    if($tbl == "tbl_movies"){
      $tbl2 = "tbl_genre";
      $tbl3 = "tbl_mov_gen";
      $col2 = "genre_id";
      $col3 = "genre_name";

      $getGenres = getAll($tbl2);
      $movieGenre = movGen($tbl, $tbl2, $tbl3, $col, $col2, $col3, $id);
      echo "<div class=\"checkbox\">";
      while($row = mysqli_fetch_array($getGenres)){
        echo "<input type=\"checkbox\" name=\"genres[]\" value=\"{$row['genre_id']}\">{$row['genre_name']}</input>";
      }
      echo "</div>";
    }

    echo "<input id=\"submit\" type=\"submit\" name=\"submit\" value=\"UPDATE\">";
    echo "</form>";
  }


 ?>
