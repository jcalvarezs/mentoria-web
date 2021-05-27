<?php
namespace app/controllers;
app/core/controller;

class SiteController extends controller
{
    public function home()
    {
    application::$app->router->renderView('home');
    return $this->render('home');
    }

    public function contact()
    {
    application::$app->router->renderView('contact');
    return $this->render('contact');
    }

    public function handlecontact()
    {
    return "Procesando información"
    }
}    