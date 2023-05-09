<?php

use app\core\Application;

require_once __DIR__ . '/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$config = [
    'user_class' => \app\models\User::class,
    'db' => [
        'dsn' => $_ENV['DB_DSN'],
        'password' => $_ENV['DB_PASSWORD'],
        'user' => $_ENV['DB_USER'],
    ]
];

$app = new Application(__DIR__, $config);

$users = [
    [
        "email" => "joao@teste.com",
        "firstname" => "João",
        "lastname" => "Mangueira",
        "password" => 123456,
        "passwordConfirm" => 123456,
        "type" => 1, //admin
    ],
    [
        "email" => "antonio@teste.com",
        "firstname" => "Antônio",
        "lastname" => "Silva",
        "password" => 123456,
        "passwordConfirm" => 123456,
        "type" => 0, //comum
    ],
];

echo "*************** CRIANDO USUARIOS ****************\n";
foreach ($users as $user) {

    $user_model = new \app\models\User();
    $user_model->loadData($user);
    if(!$user_model->validate()) {
        echo "ERRO AO CRIAR USUARIO\n";
        var_dump($user_model);
        continue;
    }
    $user_model->save();
}
echo "*******************************\n";

$_products_types = [
    [
        "name" => "eletrodomésticos",
        "description" => "Produtos eletronicos",
        "tax" => 17,
    ],
    [
        "name" => "Moveis",
        "description" => "Produtos de madeira",
        "tax" => 9.5,
    ],
    [
        "name" => "Cama, mesa e banho",
        "description" => "Produtos para a casa",
        "tax" => 11.5,
    ],
];

echo "*************** CRIANDO TIPOS DE PRODUTO ****************\n";
foreach ($_products_types as $type) {

    $types_model = new \app\models\ProductType();
    $types_model->loadData($type);
    if(!$types_model->validate()) {
        echo "ERRO AO CRIAR TIPO DE PRODUTO\n";
        continue;
    }
    $types_model->save();
}

echo "*******************************\n";

$_products = [
    [
        "name" => "Geladeira",
        "image" => "ft000001.jpg",
        "description" => "Geladeira 2 portas",
        "price" => 1420.90,
        "status" => 1,
        "product_type_id" => 1,
    ],
    [
        "name" => "Microondas",
        "image" => "ft000002.jpg",
        "description" => "Microondas 20 litros",
        "price" => 420.00,
        "status" => 1,
        "product_type_id" => 1,
    ],
    [
        "name" => "Maquina lavar roupas",
        "image" => "ft000003.jpg",
        "description" => "Geladeira 9 litros",
        "price" => 944.00,
        "status" => 1,
        "product_type_id" => 1,
    ],
    [
        "name" => "Cama casal",
        "image" => "ft000004.jpg",
        "description" => "Cama king size",
        "price" => 1399.00,
        "status" => 1,
        "product_type_id" => 2,
    ],
    [
        "name" => "Guarda roupas",
        "image" => "ft000005.jpg",
        "description" => "Guarda roupas 6 portas branco",
        "price" => 821.00,
        "status" => 1,
        "product_type_id" => 2,
    ],
    [
        "name" => "Sofá 3 lugares",
        "image" => "ft000006.jpg",
        "description" => "Sofa 3 lugares",
        "price" => 1600.00,
        "status" => 1,
        "product_type_id" => 2,
    ],
    [
        "name" => "Toalha banho",
        "image" => "ft000007.jpg",
        "description" => "Toalha grande.",
        "price" => 40.90,
        "status" => 1,
        "product_type_id" => 3,
    ],
    [
        "name" => "Caixa organizadora",
        "image" => "ft000008.jpg",
        "description" => "Caixa organizadora transparente de 50 litros.",
        "price" => 40.90,
        "status" => 1,
        "product_type_id" => 3,
    ],
    [
        "name" => "Box livros coleção harry potter",
        "image" => "ft000009.jpg",
        "description" => "Coleção dos 7 livros do bruxo mais famoso do mundo.",
        "price" => 181.80,
        "status" => 1,
        "product_type_id" => 3,
    ],
    [
        "name" => "Celular",
        "image" => "ft000010.jpg",
        "description" => "Celular Xiaomi",
        "price" => 2190.00,
        "status" => 1,
        "product_type_id" => 1,
    ],
];

echo "*************** CRIANDO TIPOS DE PRODUTO ****************\n";
foreach ($_products as $product) {
    $product_model = new \app\models\Product();
    $product_model->loadData($product);
    if(!$product_model->validate()) {
        echo "ERRO AO CRIAR PRODUTO\n";
        continue;
    }
    $product_model->save();
}
echo "*******************************\n";

$sales = [
    [
        "amount" => 1662.45,
        "amount_without_tax" => 1420.9,
        "amount_with_tax" => 241.55,
    ],
    [
        "amount" => 1872.00,
        "amount_without_tax" => 1600.00,
        "amount_with_tax" => 272.00,
    ]
];

echo "*************** CRIANDO VENDAS ****************\n";
foreach ($sales as $sale) {
    $sale_model = new \app\models\Sale();
    $sale_model->loadData($sale);
    if(!$sale_model->validate()) {
        echo "ERRO AO CRIAR VENDA\n";
        continue;
    }
    $sale_model->save();
}
echo "*******************************\n";

