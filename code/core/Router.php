<?php
namespace app\core;
use app\core\Application;
use app\core\Request;
use app\core\Response;
class Router
{
    public Request $request;
    public Response $response;
    protected array $routes = [];

    public function __construct(Request $request,Response $response  )
    {
        $this-> request =$request;
        $this-> response =$response;
    }

    public function get($path, $callback)
    {
        $this->routes['get'][$path] =$callback;
    }
    public function post($path, $callback)
    {
        $this->routes['post'][$path] =$callback;
    }

    public function resolve()
    {
        $path= $this->request->getPath();
        $method= $this->request->getMethod();

        $callback = $this->routes[$method][$path] ?? false;

       /* var_dump($path);
        var_dump($method);*/

        if ($callback === false)
        {
            //Application::$app->response->setStausCode(404)
            $this->response->setStatusCode(404);
           // return "Not Found";  
           return $this->renderView("_404");
        }

        if (is_string($callback)){
            return $this->renderView($callback);
        }
            /*$callback = array(2) { 
            [0]=> string(30) "app\Controllers\SiteController" 
            [1]=> string(4) "home" }*/

        if (is_array($callback)){
           // $callback[0]=new $callback[0]();
           Application::$app->controller = new $callback[0]();
           $callback[0] = Application::$app->controller;

        }    

        return call_user_func($callback, $this->request);
    }

    public function renderContent($viewsContent)
    {
        $layoutContent = $this->layoutContent();    
        return str_replace('{{content}}',$viewsContent,$layoutContent);
    }

    public function renderView($view, $params=[])
    {
        $layoutContent = $this->layoutContent();
        $viewsContent= $this->renderOnlyView($view, $params);
    
        return str_replace('{{content}}',$viewsContent,$layoutContent );

    }
    public function layoutContent()
    {
        $layout = Application::$app-> controller->layout;
        ob_start();
       // include_once Application::$ROOT_DIR ."/views/layout/main.php";
       include_once Application::$ROOT_DIR ."/views/layout/$layout.php";
        return ob_get_clean();
    }

    public function renderOnlyView($view, $params)
    {
        foreach($params as $key => $value){
             $$key = $value;

        }
                
        ob_start();
        include_once Application::$ROOT_DIR ."/views/$view.php";
        return ob_get_clean();
    }
    

    
}
