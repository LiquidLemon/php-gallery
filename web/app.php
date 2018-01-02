<?php
require '../vendor/autoload.php';
require '../Router.php';

$router = new Router();

$router->get('/img/new', 'ImgController::new');
$router->_404('ErrorController::_404');

$view = $router->dispatch();
$view->render();
