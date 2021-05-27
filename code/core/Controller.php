<?php

namespace app\core;


class controlller
{
public function render($view)
    return  application::$app->router->renderView($view);
}