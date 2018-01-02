<?php
require_once '../View.php';

class RedirectView {
  private $path;

  public function __construct($path, $code) {
    $this->path = $path;
    $this->code = $code;
  }

  public function renderHead() {
    header("Location: {$this->path}");
  }
}
