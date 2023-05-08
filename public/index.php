<?php

use app\controllers\SiteController;
use app\controllers\AuthController;
use app\controllers\ProductTypeController;
use app\controllers\ProductController;
use app\core\Application;

require_once __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

$config = [
    'user_class' => \app\models\User::class,
    'db' => [
        'dsn' => $_ENV['DB_DSN'],
        'password' => $_ENV['DB_PASSWORD'],
        'user' => $_ENV['DB_USER'],
    ]
];

$app = new Application(dirname(__DIR__), $config);

$app->router->get('/', [SiteController::class, 'home']);

$app->router->get('/login', [AuthController::class, 'login']);
$app->router->post('/login', [AuthController::class, 'login']);

$app->router->get('/register', [AuthController::class, 'register']);
$app->router->post('/register', [AuthController::class, 'register']);

$app->router->get('/logout', [AuthController::class, 'logout']);
$app->router->get('/profile', [AuthController::class, 'profile']);

$app->router->get('/types/list', [ProductTypeController::class, 'list']);
$app->router->get('/types/$id', [ProductTypeController::class, 'detail']);
$app->router->post('/types/$id', [ProductTypeController::class, 'detail']);
$app->router->get('/types/create', [ProductTypeController::class, 'create']);
$app->router->post('/types/create', [ProductTypeController::class, 'create']);

$app->router->get('/product/list', [ProductController::class, 'list']);
$app->router->get('/product/create', [ProductController::class, 'create']);
$app->router->post('/product/create', [ProductController::class, 'create']);
$app->router->get('/product/$id', [ProductController::class, 'detail']);
$app->router->post('/product/$id', [ProductController::class, 'detail']);

$app->run();