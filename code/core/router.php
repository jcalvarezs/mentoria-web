<?php
namespace app\core;

class Router
{
    public Request $request;
    protected array $routes = [];

    public function __construct(\app\core\Request $request )
    {
        this-> router
    }

    public function get($path, $callback)
    {
        $this->routes['get'][$path] =$callback;
    }

    public function resolve()
    {
       /* echo "<pre>";
        var_dump($_SERVER);
        echo "</pre>";
        exit;*/
        $path= $this->request->getPath();
        $path= $this->request->getMetod();
    }

}