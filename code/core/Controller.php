<?php

namespace app\core;


class Controller
{
    public function render($view){
         return  application::$app->router->renderView($view);
    }
}