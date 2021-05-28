<?php

namespace app\core;


class Controller
{
    public function render($view, $params = [])
    
    {
         return  application::$app->router->renderView($view, $params);
    }
}