<?php
namespace app\controllers;

use app\core\Controller;
use app\core\Request;

class SiteController extends Controller
{
    public function home()
    {
        $params = [
            'name' => 'Juan',
            'surname' => 'Alvarez',
        ];
        return $this->render('home',$params);
    }

    public function contact()
    { 
        return $this->render('contact');
    }

    public function handleContact(Request $request)
    {
        /*$body = Application::$app->request->getBody();
        var_dump($body);*/
        $body = $request->getBody();
        //var_dump($body);
        // exit;
        return "Procesando información";
    }
}    