<?php

require_once  __DIR__ . '/../vendor/autoload.php';

use app\core\Application;

$dotenv = Dotenv\Dotenv::createImmutable(dirname(_DIR_));
$dotenv->load();

$config = [

    'db' =>[
        'dns' => $_ENV['DNS'],
        'user' =>$_ENV['USER'],
        'password' =>$_ENV['PASSWORD'],
    ]
];

$app = new Application(dirname(__DIR__), $config);

/*$app->router->get('/', 'home');

$app->router->get('/contact', 'contact');
$app->router->post('/contact', function(){
    return "Procesando información";
});*/
$app->router->get('/' , [\app\controllers\SiteController::class, 'home']);
$app->router->get('/contact', [\app\controllers\SiteController::class, 'contact']);
$app->router->post('/contact', [\app\controllers\SiteController::class, 'handleContact']);

$app->router->get('/register', [\app\controllers\AuthController::class, 'register']);
$app->router->post('/register', [\app\controllers\AuthController::class, 'register']);

$app->router->get('/login', [\app\controllers\AuthController::class, 'login']);
$app->router->post('/login', [\app\controllers\AuthController::class, 'login']);
$app->run();