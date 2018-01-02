<?php
require_once '../views/LayoutView.php';

class ImgController {
  public function new() {
    return new LayoutView('imgnew');
  }
}
