<?php

namespace app\controllers;

use app\core\Request;
use app\core\controllers;
use app\models\RegisterModel;

namespace app\models;
class AuthController
{
    public function login()
    {
        return  $this->render('login');
    }
    public function register(Request $request)
    {
        $this->setlayout('auth');
        
        if (request-> isPost()){
            $registerModel = new RegisterModel();
            return "prosesandoi datos"
        }

        return  $this->render('registrer');
        
    }


}
public