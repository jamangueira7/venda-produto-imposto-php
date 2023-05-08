<?php

namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\core\middlewares\AuthMiddleware;
use app\core\Request;
use app\core\Response;
use app\models\LoginForm;
use app\models\User;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->registerMiddleware(new AuthMiddleware(['profile']));
    }

    public function login(Request $request, Response $response)
    {
        $login_form = new LoginForm();
        if($request->method() === 'post') {
            $login_form->loadData($request->getBody());
            if($login_form->validate() && $login_form->login()) {
                $response->redirect("/");
                return;
            }
        }

        //$this->setLayout("auth");
        return $this->render('login', [
            'model' => $login_form
        ]);
    }

    public function logout(Request $request, Response $response)
    {
        Application::$app->logout();
        $response->redirect("/");

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

    public function profile(Request $request, Response $response)
    {
        return $this->render('profile');

    }
}