<?php

namespace app\controllers;

use app\core\Application;
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

        if($request->method() === 'post') {
            $product->loadData($request->getBody());
            $product->image = $request->getBody()['image_hidden'];

            if($_FILES['image']['name'] !== "" && $product->image !== $_FILES['image']['name']) {
                $product->image = 'ft'.time().'.jpg';
                $dir = dirname(__DIR__) . '/public/img/'. basename($product->image);
                if(!move_uploaded_file($_FILES['image']['tmp_name'], $dir)){
                    Application::$app->session->setFlash('alert', [
                        "msg" => 'Problema para gravar imagem.',
                        "type" => 'danger',
                    ]);
                    $response->redirect("/product/list");
                }
            }

            if($product->validate() && $product->change($request->id)) {
                Application::$app->session->setFlash('alert', [
                    "msg" => 'Produto alterado com sucesso',
                    "type" => 'success',
                ]);
                $response->redirect("/product/list");
                return;
            }
        } else {
            $data = $product->findOne(["id" => $request->id]);

            if(empty($data)) {
                throw new NotFoundException();
            }
            $product->loadData($data);
        }

        return $this->render('product_detail', [
            'model' => $product,
            'types' => $model->findAll(),
        ]);

    }
}