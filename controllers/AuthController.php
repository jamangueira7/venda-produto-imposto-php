<?php

namespace app\controllers;

use app\core\Controller;
use app\core\Request;
use app\models\Product;

class AuthController extends Controller
{
    public function login()
    {
        $this->setLayout("auth");
        return $this->render('login');
    }

    public function register(Request $request)
    {
        $product = new Product();
        if($request->method() === 'post') {
            $product->loadData($request->getBody());

            if($product->validate() && $product->save()) {
                return 'success';
            }

        }

        return $this->render('register', [
            "model" => $product
        ]);
    }
}