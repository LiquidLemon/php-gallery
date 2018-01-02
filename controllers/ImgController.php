<?php
require_once '../views/LayoutView.php';
require_once '../views/RedirectView.php';

class ImgController {
  public function new() {
    return new LayoutView('imgnew');
  }

  public function add() {
    $valid = true;

    $author = post('author');
    if ($author == '') {
      $valid = false;
      Flash::error("Author can't be empty");
    }

    $title = post('title');
    if ($title == '') {
      $valid = false;
      Flash::error("Title can't be empty");
    }

    $watermark = post('watermark');
    if ($watermark == '') {
      $watermark = false;
      Flash::error("Watermark can't be empty");
    }

    return new RedirectView('/img/new', 303);
  }
}
