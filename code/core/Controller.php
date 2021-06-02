<?php

namespace app\core;


class Controller
{
    public string $layout = 'main';
    public function render($view, $params = [])
    
    {
         return  application::$app->router->renderView($view, $params);
    }

    public function setlayout($layout)
    {
    $this->layout=$layout;
    }
}