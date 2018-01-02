<?php

foreach ($imgs as $img) {
  $private = $img->public ? '' : '[P] ';
  $thumbPath = "/thumb/{$img->id()}.png";
  $imgPath = "/preview/{$img->id()}.png";
  echo "<div class=\"image\">";
  echo "<a href=\"{$imgPath}\"><img src=\"{$thumbPath}\"></a>";
  echo "<p class=\"caption\">{$private}{$img->title}</p>";
  echo "</div>";
}
