<?php

function generateThumbnail($file, $path, $format) {
  $create = "imagecreatefrom{$format}";
  $img = $create($file);
  $thumb = imagescale($img, 200, 125);
  imagedestroy($img);
  imagepng($thumb, $path);
}

function generateWatermark($file, $path, $format, $text) {

}
