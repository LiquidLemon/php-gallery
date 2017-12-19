<?php

class Router {
  private $get;

  public function __construct() {
    $this->get = [];
  }

  public function get($path, $action) {
    $this->get[$path] = $action;
  }

  public function dispatch() {
    $path = explode('?', $_SERVER['REQUEST_URI'])[0];
    $method = strtolower($_SERVER['REQUEST_METHOD']);
    $action = explode('::', $this->$method[$path]);
    $controller = $action[0];
    $handler = $action[1];

    require_once "controllers/{$controller}.php";
    return (new $controller)->$handler();
  }

}
