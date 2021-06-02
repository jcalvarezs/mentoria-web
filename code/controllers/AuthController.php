<?php

namespace app\controllers;

use app\core\Request;
use app\core\controllers;
use app\models\RegisterModel;

namespace app\models;

use app\core\Controller;

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
        
        if (request-> isPost()){
            $registerModel = new RegisterModel();
            return "Prosesando Datos"
        }

        return  $this->render('registrer');
        
    }


}
public