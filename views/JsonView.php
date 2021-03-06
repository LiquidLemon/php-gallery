<?php
require_once '../View.php';

class JsonView extends View {
  private $data;

  public function __construct($data) {
    $this->data = $data;
  }

  public function renderBody() {
    echo json_encode($this->data);
  }
}
