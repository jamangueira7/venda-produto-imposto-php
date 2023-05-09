<?php

namespace app\controllers;

use app\core\Controller;
use app\core\exceptions\NotFoundException;
use app\core\middlewares\AdminMiddleware;
use app\core\Request;
use app\core\Response;
use app\models\ProductType;
use app\models\Product;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->registerMiddleware(new AdminMiddleware(["list", "create", "detail"]));
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

    public function detail(Request $request, Response $response)
    {

        $product = new Product();
        $model = new ProductType();

        $data = $product->findOne(["id" => $request->id]);

        if(empty($data)) {
            throw new NotFoundException();
        }


        if($request->method() === 'post') {
            $product->loadData($request->getBody());
            if($product->validate() && $product->change($request->id)) {
                $response->redirect("/product/list");
                return;
            }
        }

        return $this->render('product_detail', [
            'model' => $data,
            'types' => $model->findAll(),
        ]);

    }
}