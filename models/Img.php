<?php
require_once '../Model.php';

class Img extends Model {
  private $author;
  private $title;
  private $format;

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
    $instance->id = (string)$object['id'];
    return $instance;
  }
}
