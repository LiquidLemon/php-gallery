<?php
require '../Router.php';

$router = new Router();
$router->get('/post/new', 'PostController::new');

$router->_404('ErrorController::_404');

$view = $router->dispatch();
$view->render();
