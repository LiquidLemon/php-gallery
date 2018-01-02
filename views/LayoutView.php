<?php
require_once '../View.php';

class LayoutView extends View {
  protected $template;
  protected $data;
  protected $layout = 'layout';

  public function __construct($template, $data = []) {
    $this->template = $template;
    $this->data = $data;
  }

  public function renderBody() {
    $template = "{$this->template}.php";
    extract($this->data);
    include "../layouts/{$this->layout}.php";
  }
}
