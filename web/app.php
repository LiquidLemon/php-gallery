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

$router->get('/login', 'UserController::login');
$router->post('/login', 'UserController::authenticate');

$router->get('/imgs/favorite', 'FavoriteController::index');
$router->post('/imgs/favorite', 'FavoriteController::set');
$router->post('/imgs/unfavorite', 'FavoriteController::remove');

$router->get('/', 'StaticController::index');
$router->get('/ctf', 'StaticController::ctf');
$router->get('/events', 'StaticController::events');
$router->get('/newsletter', 'StaticController::newsletter');

$router->get('/img', 'ImgController::get');
$router->get('/imgs/search', 'ImgController::search');

$router->_404('ErrorController::_404');

$view = $router->dispatch();
$view->render();
