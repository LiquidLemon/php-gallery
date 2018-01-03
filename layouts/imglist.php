<?php

$user = currentUser();
$favorites = isset($_SESSION['favorites']) ? $_SESSION['favorites'] : [];

echo '<form action="/imgs/favorite" method="POST">';
foreach ($imgs as $img) {
  $private = $img->public ? '' : '[P] ';
  $thumbPath = "/thumb/{$img->id()}.png";
  $imgPath = ($user && $user->name == $img->author)
    ? "/images/{$img->id()}.{$img->format}"
    : "/preview/{$img->id()}.png";
  echo "<div class=\"image\">";
  echo "<a href=\"{$imgPath}\"><img src=\"{$thumbPath}\"></a>";
  echo "<p class=\"caption\">{$private}{$img->title}</p>";
  $checked = in_array($img->id(), $favorites) ? 'checked' : '';
  echo "<input type=\"checkbox\" name=\"selected[]\"value=\"{$img->id()}\" {$checked}>";
  echo "</div>";
}
echo '<input type="submit" value="Favorite">';
echo "</form>";
