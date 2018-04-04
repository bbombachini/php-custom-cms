<?php

	function redirect_to($location) {
		if($location != NULL) {
			header("Location: {$location}");
			exit;
		}
	}

	function resize_image($file, $w, $h) {
    list($width, $height) = getimagesize($file);
    $ratio = $width / $height;
    	$newwidth = $w;
    	$newheight = $h;

      if ($w/$h > $ratio) {
          $newwidth = $h*$ratio;
          $newheight = $h;
      } else {
          $newheight = $w/$ratio;
          $newwidth = $w;
      }

    $src = imagecreatefromjpeg($file);
    $dest = imagecreatetruecolor($newwidth, $newheight);
    imagecopyresampled($dest, $src, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);

    return $dest;
}

?>
