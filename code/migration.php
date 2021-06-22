<?php

require_once  __DIR__ .'/vendor/autoload.php';

use app\core\Application;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$config = [

    'db' =>[
        'dns' => $_ENV['DNS'],
        'user' =>$_ENV['USER'],
        'password' =>$_ENV['PASSWORD'],
    ]
];

$app = new Application(__DIR__, $config);

$app->db->applyMigrations();