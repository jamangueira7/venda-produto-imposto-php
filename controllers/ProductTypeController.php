<?php

namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\core\exceptions\NotFoundException;
use app\core\middlewares\AdminMiddleware;
use app\core\middlewares\AuthMiddleware;
use app\core\Request;
use app\core\Response;
use app\models\LoginForm;
use app\models\ProductType;
use app\models\User;

class ProductTypeController extends Controller
{
    public function __construct()
    {
        $this->registerMiddleware(new AdminMiddleware(['create', "list", "detail"]));
    }

    public function create(Request $request, Response $response)
    {
        $model = new ProductType();
        if($request->method() === 'post') {
            $model->loadData($request->getBody());
            if($model->validate() && $model->save()) {
                $response->redirect("/");
                return;
            }
        }

        //$this->setLayout("auth");
        return $this->render('types_create', [
            'model' => $model
        ]);
    }
    public function list(Request $request, Response $response)
    {
        $model = new ProductType();

        return $this->render('types_list', [
            'types' => $model->findAll()
        ]);

    }

    public function detail(Request $request, Response $response)
    {
        $model = new ProductType();

        $data = $model->findOne(["id" => $request->id]);

        if(empty($data)) {
            throw new NotFoundException();
        }

        if($request->method() === 'post') {
            $model->loadData($request->getBody());
            if($model->validate() && $model->change($request->id)) {
                $response->redirect("/types/list");
                return;
            }
        }

        return $this->render('types_detail', [
            'model' => $data
        ]);

    }
}