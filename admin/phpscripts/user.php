<?php

  function checkPass($pass, $hash){
    if(password_verify($pass, $hash)) {
      $verified = true;
    } else {
      $verified = false;
    }
    return $verified;
  }

 ?>
