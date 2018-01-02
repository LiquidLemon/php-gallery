<?php
require_once '../Model.php';

class Img extends Model {
  public $author;
  public $title;
  public $format;

  public function __construct($author, $title, $format) {
    $this->author = $author;
    $this->title = $title;
    $this->format = $format;
  }

  protected function serialize() {
    $object = [
      'author' => $this->author,
      'title' => $this->title,
      'format' => $this->format
    ];
    return array_merge(parent::serialize(), $object);
  }

  static protected function deserialize($object) {
    $instance = new static(
      $object['author'],
      $object['title'],
      $object['format']
    );
    $instance->id = (string)$object['_id'];
    return $instance;
  }
}
