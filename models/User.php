<?php
require_once '../Model.php';

class User extends Model {
  public $name;
  public $email;
  public $passwordHash;

  public function __construct($name, $email, $passwordHash) {
    $this->name = $name;
    $this->email = $email;
    $this->passwordHash = $passwordHash;
  }

  protected function serialize() {
    $object = [
      'name' => $this->name,
      'email' => $this->email,
      'passwordHash' => $this->passwordHash
    ];
    return array_merge(parent::serialize(), $object);
  }

  static protected function deserialize($object) {
    $instance = new static(
      $object['name'],
      $object['email'],
      $object['passwordHash']
    );
    $instance->id = (string)$object['_id'];
    return $instance;
  }
}
