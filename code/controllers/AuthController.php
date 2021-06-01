<?php

namespace app\controllers;

use app\core\Request;
use app\core\controllers;
class AuthController
{
    public function login()
    {
        return  $this->render('login');
    }
    public function register(Request $request)
    {
        return  $this->render('registrer');
        
    }

}
public