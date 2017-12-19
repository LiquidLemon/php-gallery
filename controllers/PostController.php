<?php
require_once '../views/PostAddView.php';
require_once '../views/RedirectView.php';

class PostController {
  public function new() {
    return new PostAddView();
  }

  public function add() {
    $title = $_POST['title'];
    $contents = $_POST['contents'];

    return new RedirectView('/post/new', 303);
  }
}
