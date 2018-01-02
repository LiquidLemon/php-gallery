<?php
require '../vendor/autoload.php';
require '../Router.php';
require '../Flash.php';
require '../helpers.php';

session_start();
Flash::init();
$router = new Router();

$router->get('/img/new', 'ImgController::new');
$router->post('/img', 'ImgController::add');
$router->get('/imgs', 'ImgController::index');

$router->get('/signup', 'UserController::signup');
$router->post('/user', 'UserController::add');

$router->_404('ErrorController::_404');

$view = $router->dispatch();
$view->render();
