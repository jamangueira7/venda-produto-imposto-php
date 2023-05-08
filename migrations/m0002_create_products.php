<?php

use app\core\Application;

class m0002_create_products
{
    public function up()
    {
        $db = Application::$app->db;
        $SQL = "CREATE TABLE products (
                id serial PRIMARY KEY,
                name VARCHAR(255) NOT NULL,
                description VARCHAR(255) NOT NULL,
                price VARCHAR(255) NOT NULL,
                status SMALLINT DEFAULT 1,
                product_type_id INT NOT NULL,
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
            );";

        $db->pdo->exec($SQL);
    }

    public function down()
    {
        $db = Application::$app->db;
        $SQL = "DROP TABLE products;";

        $db->pdo->exec($SQL);
    }
}