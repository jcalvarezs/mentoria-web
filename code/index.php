<?php

//envez de incluir el archivo 
require_once _DIR_ .'/vendor/autoload.php';

use app\core\Application;

//echo "Hello Framework";
//inicializacion de componente
//$app = new app\core\Application();
$app = new Application();

//$router= new Router();

$app->$router->get('/', function(){
    return "Hola Mundo";
});

$app->$router->get('/contact', function(){
    return "Contact";
});

/*$app->$router->post('/contact', function(){
    return "Contact";
});*/

$app->run();