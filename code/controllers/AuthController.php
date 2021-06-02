<?php

namespace app\controllers;

use app\core\Request;
use app\core\Controller;
use app\models\RegisterModel;

class AuthController extends Controller
{
    public function login()
    {
        $this->setlayout('auth');
        return  $this->render('login');
    }
    public function register(Request $request)
    {
        $this->setlayout('auth');
        
        if ($request->isPost())
        {
            $registerModel = new RegisterModel();
            return "Procesando Datos";
        }

        return  $this->render('register');
        
    }


}