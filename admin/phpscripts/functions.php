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
    $dst = imagecreatetruecolor($newwidth, $newheight);
    imagecopyresampled($dst, $src, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);

    return $dst;
}

?>
