<?php
namespace app\core;


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

        if ($callback === false){
            //Application::$app->response->setStausCode(404)
            $this->response->setStatusCode(404);
           // return "Not Found";  
           return $this->renderView("_404");
        }

        if (is_string($callback)){
            return $this->renderView($callback);

        }
        return call_user_func($callback);
    }
    public function renderContent($viewsContent)
    {
        $layoutContent = $this->layoutContent();    
        return str_replace('{{content}}',$viewsContent,$layoutContent);
    }

    public function renderView($view)
    {
        $layoutContent = $this->layoutContent();
        $viewsContent= $this->renderOnlyView($view);
    
        return str_replace('{{content}}',$viewsContent,$layoutContent );

    }
    public function layoutContent()
    {
        ob_start();
        include_once Application::$ROOT_DIR ."/views/layout/main.php";
        return ob_get_clean();
    }

    public function renderOnlyView($view)
    {
        ob_start();
        include_once Application::$ROOT_DIR ."/views/$view.php";
        return ob_get_clean();
    }
    

    
}
