<?php
require_once '../DB.php';

class Post {
  private $title;
  private $contents;
  private $_id;

  public function __construct($title, $contents) {
    $this->title = $title;
    $this->contents = $contents;
  }

  public function save() {
    $response = DB::get()->posts->insertOne([
      'title' => $this->title,
      'contents' => $this->contents
    ]);
    $this->_id = $response->getInsertedId();
  }
}
