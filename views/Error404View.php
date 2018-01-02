<?php
require_once 'LayoutView.php';

class Error404View extends LayoutView {
  public function __construct() {
    parent::__construct('404');
    $this->code = 404;
  }
}
