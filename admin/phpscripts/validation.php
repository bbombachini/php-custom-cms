<?php

function form_errors($errors=array()){
  $op = "";
  if(!empty($errors)){
    $op .= "<ul>";
    foreach ($errors as $key => $error) {
      $op .= "<li> * {$error}</li>";
    }
    $op .= "</ul>";
  }
  return $op;
}

function has_value($value){
  return isset($value) && $value !== "";
}

?>
