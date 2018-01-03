<?php
require_once '../views/LayoutView.php';

class StaticController {
  public function index() {
    return new LayoutView('index');
  }

  public function ctf() {
    return new LayoutView('ctf');
  }

  public function events() {
    return new LayoutView('events');
  }

  public function newsletter() {
    return new LayoutView('newsletter');
  }
}
