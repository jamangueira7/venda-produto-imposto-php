<?php

namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\core\Request;
use app\models\User;

class AuthController extends Controller
{
    public function login()
    {
        $this->setLayout("auth");
        return $this->render('login');
    }

    public function register(Request $request)
    {
        $product = new User();
        if($request->method() === 'post') {
            $product->loadData($request->getBody());

            if($product->validate() && $product->save()) {
                Application::$app->session->setFlash('success', 'Usuario cadastrado');
                Application::$app->response->redirect("/");
            }

        }

        return $this->render('register', [
            "model" => $product
        ]);
    }
}