<?php
class NavLink {
  public $path;
  public $name;
  public $command;
  public $sublinks;

  public function __construct($path, $name, $command = '', $sublinks = []) {
    $this->path = $path;
    $this->name = $name;
    $this->command = $command;
    $this->sublinks = $sublinks;
  }

  public function isPath($path) {
    return $this->path == $path || array_reduce($this->sublinks, function ($memo, $link) use ($path) {
      return $memo || $link->path == $path;
    }, false);
  }
}

$links = [
  new NavLink('/', 'index.htm', 'cat '),
  new NavLink('/ctf', 'ctf?wtf', 'curl 1.3.3.7/'),
  new NavLink('/events', 'events', 'find / ', [
    new NavLink('https://ctftime.org', 'ctftime'),
    new NavLink('https://github.com/ctfs/write-ups-2017', 'writeups_2017')
  ]),
  new NavLink('/imgs', 'images', '', [
    new NavLink('/img/new', 'new'),
    new NavLink('/imgs/favorite', 'favorite')
  ]),
  new NavLink('/newsletter', 'newsletter')
];

if (!currentUser()) {
  array_push($links, new NavLink('/login', 'login'));
  array_push($links, new NavLink('/signup', 'signup'));
}

$currentPath = $_SERVER['REQUEST_URI'];
echo '<ul>';
foreach ($links as $link) {
  echo '<li>';
  $active = $link->isPath($currentPath) ? 'class="link-active"' : '';
  echo "<a href=\"{$link->path}\" {$active}>";
  echo '<span class="command">' . $link->command . '</span>';
  echo "{$link->name}</a>";
  if (count($link->sublinks) > 0 && $link->isPath($currentPath)) {
    echo '<ul class="sublinks">';
    foreach ($link->sublinks as $sub) {
      echo '<li>';
      echo "<a href=\"{$sub->path}\">{$sub->name}</a>";
      echo '</li>';
    }
    echo '</ul>';
  }
  echo '</li>';
}
echo '</ul>';
