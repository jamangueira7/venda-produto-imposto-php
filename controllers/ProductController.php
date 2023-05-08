<?php

namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\core\middlewares\AuthMiddleware;
use app\core\Request;
use app\core\Response;
use app\models\LoginForm;
use app\models\ProductType;
use app\models\Product;

class ProductController extends Controller
{
    public function __construct()
    {
        //$this->registerMiddleware(new AuthMiddleware(['profile']));
    }

    public function create(Request $request, Response $response)
    {
        $model = new Product();
        $types = new ProductType();
        if($request->method() === 'post') {
            $model->loadData($request->getBody());
            if($model->validate() && $model->save()) {
                $response->redirect("/");
                return;
            }
        }

        //$this->setLayout("auth");
        return $this->render('product_create', [
            'model' => $model,
            'types' => $types->findAll(),
        ]);
    }
    public function list(Request $request, Response $response)
    {
        $product = new Product();
        $model = new ProductType();

        return $this->render('product_list', [
            'products' => $product->findAll(),
            'types' => $model,
        ]);

    }
}