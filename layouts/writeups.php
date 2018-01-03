<?php
$images = [
  'assets/hack_the_planet.jpg',
  'assets/img2.jpg',
  'assets/img3.jpg',
  'assets/img4.png',
  'assets/img5.jpg',
];
?>
<h2>Writeups</h2>
<div class="gallery">
  <?php foreach ($images as $image): ?>
  <a href="<?= $image ?>" class="element"><img src="<?= $image ?>" alt="hack_the_planet"></a>
  <?php endforeach; ?>
</div>

