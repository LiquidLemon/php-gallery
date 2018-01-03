<?php

$user = currentUser();
$favorites = isset($_SESSION['favorite']) ? $_SESSION['favorite'] : [];

echo '<form action="/imgs/unfavorite" method="POST">';
foreach ($imgs as $img) {
  $private = $img->public ? '' : '[P] ';
  $thumbPath = "/thumb/{$img->id()}.png";
  $imgPath = ($user && $user->name == $img->author)
    ? "/images/{$img->id()}.png"
    : "/preview/{$img->id()}.png";
  echo "<div class=\"image\">";
  echo "<a href=\"{$imgPath}\"><img src=\"{$thumbPath}\"></a>";
  echo "<p class=\"caption\">{$private}{$img->title}</p>";
  echo "<input type=\"checkbox\" name=\"selected[]\"value=\"{$img->id()}\">";
  echo "</div>";
}
echo '<input type="submit" value="Remove">';
echo "</form>";
