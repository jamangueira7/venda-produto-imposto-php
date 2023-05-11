<?php

namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\core\exceptions\ForbiddenException;
use app\core\exceptions\NotFoundException;
use app\core\middlewares\AdminMiddleware;
use app\core\middlewares\AuthMiddleware;
use app\core\Request;
use app\core\Response;
use app\models\LoginForm;
use app\models\Product;
use app\models\ProductSale;
use app\models\ProductType;
use app\models\Sale;
use app\models\User;

class ShoppingController extends Controller
{
    public function __construct()
    {
        $this->registerMiddleware(new AdminMiddleware(['list']));
    }

    public function list(Request $request, Response $response)
    {
        $model = new Sale();
        $user = new User();

        return $this->render('shopping_list', [
            'model' => $model->findAll(),
            'user' => $user,
        ]);

    }

    public function myshopping(Request $request, Response $response)
    {
        $model = new Sale();
        $user = new User();

        $user_login = Application::$app->session->get('user');

        if(!$user_login) {
            throw new ForbiddenException();
        }

        $data =  $model->find(["user_id" => $user_login]);
        return $this->render('shopping_list', [
            'model' => $data,
            'user' => $user,
        ]);

    }

    public function detail(Request $request, Response $response)
    {
        $model = new Sale();
        $product_sale = new ProductSale();
        $user = new User();
        $product = new Product();

        $data = $model->findOne(["id" => $request->id]);
        $user_login = Application::$app->session->get('user');

        if(!Application::$app::isAdmin() && $user_login !== $data->user_id) {
            throw new ForbiddenException();
        }

        if(empty($data)) {
            throw new NotFoundException();
        }

        $p_sale = $product_sale->find(["sale_id" => $data->id]);

        return $this->render('shopping_detail', [
            'model' => $data,
            'user' => $user,
            'product_sale' => $p_sale,
            'product' => $product,
        ]);

    }
}