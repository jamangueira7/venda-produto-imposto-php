<?php

namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\core\Request;
use app\core\Response;
use app\models\Cart;
use app\models\Product;
use app\models\ProductType;

class SiteController extends Controller
{

    public function home()
    {
        $product = new Product();
        $types = new ProductType();
        $model = new Cart();

        return $this->render('home', [
            'products' => $product->findAll(),
            'types' => $types,
            'model' => $model,
        ]);
    }

    public function deleteCart(Request $request, Response $response)
    {
        Application::$app->session->remove('cart');
        Application::$app->session->setFlash('alert', [
            "msg" => 'Carrinho de compras foi esvaziado.',
            "type" => 'warning',
        ]);
        $response->redirect("/");
        return;
    }

    public function deleteItemCart(Request $request, Response $response)
    {
        $cart = Application::$app->session->get('cart');
        $user = Application::$app->session->get('user');

        foreach ($cart['products'] as $key=>$item) {
            if($item['product_id'] === (int)$request->id) {
                unset($cart['products'][$key]);
                var_dump("afdfds");
            }
        }

        Application::$app->session->remove('cart');

        Application::$app->session->set('cart', [
            "products" => $cart['products'],
            "user_id" => $user
        ]);


        Application::$app->session->setFlash('alert', [
            "msg" => 'Item removido.',
            "type" => 'warning',
        ]);
        $response->redirect("/cart");
        return;
    }

    public function addCart(Request $request, Response $response)
    {
        $model = new Cart();

        $model->loadData($request->getBody());
        if($model->validate()) {
            if(Application::$app::isGuest()) {
                Application::$app->session->setFlash('alert', [
                    "msg" => 'Você precisa está logado para fazer uma compra.',
                    "type" => 'danger',
                ]);
                $response->redirect("/login");
                return;
            }
            $user = Application::$app->session->get('user');
            $cart = Application::$app->session->get('cart');
            //Application::$app->session->remove('cart');

            $add_item = [];

            if($cart) {

                foreach ($cart['products'] as $key=>$item) {
                    if($item['product_id'] === $model->product_id) {

                        $add_item = ["product_id" => $model->product_id, "quantity" => $model->quantity];

                        unset($cart['products'][$key]);
                    }
                }
                if(count($add_item) === 0) {

                    array_push($cart['products'], [
                        "product_id" => $model->product_id, "quantity" => $model->quantity
                    ]);
                } else {
                    array_push($cart['products'], $add_item);
                }

                $add_item = $cart['products'];
            } else {
                $add_item = [
                    ["product_id" => $model->product_id, "quantity" => $model->quantity],
                ];
            }

            Application::$app->session->set('cart', [
                "products" => $add_item,
                "user_id" => $user
            ]);


            Application::$app->session->setFlash('alert', [
                "msg" => 'Produto adicionado ao carrinho',
                "type" => 'success',
            ]);
        }

        $response->redirect("/");
        return;
    }

    public function show(Request $request, Response $response)
    {
        $model = new Cart();
        $product = new Product();


        $cart = Application::$app->session->get('cart');
        $data = "";

        if($cart) {
            $data = $product->prepareData($cart['products']);
        }

        return $this->render('cart', [
            'model' => $model,
            'products' => $data,
        ]);

    }
}