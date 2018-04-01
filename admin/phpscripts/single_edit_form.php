<?php
  function single_edit($tbl, $col, $id){

    $result = getSingle($tbl, $col, $id);
    $getResult = mysqli_fetch_array($result);
    echo "<h4 class=\"title-edit\">{$getResult[1]}</h4>";
    echo "<form action=\"phpscripts/edit.php\" method=\"post\">";

    echo "<input hidden name=\"tbl\" value=\"{$tbl}\">";
    echo "<input hidden name=\"col\" value=\"{$col}\">";
    echo "<input hidden name=\"id\" value=\"{$id}\">";

    for($i=0; $i < mysqli_num_fields($result)-1; $i++) {
      $dataType = mysqli_fetch_field_direct($result, $i);
      $fields = $dataType->name;
      $fieldName = str_replace("_", " ", $fields);
      $fieldType = $dataType->type;
      if($fieldName != $col && substr($fieldName, -2) != "id"){
        echo "<label>{$fieldName}</label>";
        if(substr($getResult[$i], -3) == "jpg"){
          echo "<div class=\"cover-image\"><img src=\"../public/images/$getResult[$i]\"></div>";
          echo "<input type=\"file\" name=\"{$fieldName}\" value=\"{$getResult[$i]}\"></input><br>";
        }
        else if($fieldType != "252"){
          echo "<input type=\"text\" name=\"{$fieldName}\" value=\"{$getResult[$i]}\"></input><br>";
        } else {
          echo "<textarea name=\"{$fieldName}\">{$getResult[$i]}</textarea><br>";
        }
      }
    }
    echo "<input id=\"submit\" type=\"submit\" name=\"submit\" value=\"UPDATE\">";
    echo "</form>";
  }


 ?>
