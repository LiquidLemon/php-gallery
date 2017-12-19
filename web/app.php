<?php
require '../Router.php';

$router = new Router();
$router->get('/post/new', 'PostController::new');

$view = $router->dispatch();
$view->render();
