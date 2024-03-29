<?php

use app\core\Application;

require_once __DIR__ . '/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$config = [
    'user_class' => \app\models\User::class,
    'db' => [
        'dsn' => $_ENV['DB_DSN'],
        'password' => $_ENV['DB_PASSWORD'],
        'user' => $_ENV['DB_USER'],
    ]
];

$app = new Application(__DIR__, $config);

$app->db->applyMigrations();