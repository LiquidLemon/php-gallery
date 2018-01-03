<?php
$pages = [
  '/' => ['index.htm', 'cat '],
  '/ctf' => ['ctf?wtf', 'curl 1.3.3.7/'],
  '/events' => ['events', 'find / ', [
    'https://ctftime.org' => 'ctftime',
    'https://github.com/ctfs/write-ups-2017' => 'writeups_2017'
  ]],
  '/writeups' => ['writeups', ''],
  '/newsletter' => ['newsletter', '']
];
$current_path = $_SERVER['REQUEST_URI'];
?>
<ul>
  <?php foreach ($pages as $path => $display):
          $file = $display[0];
          $command = $display[1];
          $active = $current_path === $path;
  ?>
  <li>
  <?php   if ($current_path === $path): ?>
  <span class="link-active"><?= $display[0] ?></span>
  <?php   else: ?>
    <a <?= $active ? 'class="active"' : '' ?> href="<?= $path ?>">
      <span class="command"><?= $command ?></span><?= $file ?>
    </a>
  <?php   endif; ?>
  <?php if (count($display) === 3 && $current_path === $path): ?>
    <ul class="sublinks">
      <?php foreach ($display[2] as $link => $name): ?>
      <li><a href="<?= $link ?>"><?= $name ?></a></li>
      <?php endforeach; ?>
    </ul>
  <?php endif; ?>
  </li>
  <?php endforeach; ?>
</ul>
