<?php
require_once '../views/PostAddView.php';

class PostController {
  public function new() {
    return new PostAddView();
  }
}
