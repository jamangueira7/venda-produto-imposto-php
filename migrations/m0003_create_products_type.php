<?php

use app\core\Application;

class m0003_create_products_type
{
    public function up()
    {
        $db = Application::$app->db;
        $SQL = "CREATE TABLE product_type (
                id serial PRIMARY KEY,
                name VARCHAR(255) NOT NULL,
                description VARCHAR(255) NOT NULL,
                tax FLOAT NOT NULL,
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
            );";

        $db->pdo->exec($SQL);
    }

    public function down()
    {
        $db = Application::$app->db;
        $SQL = "DROP TABLE product_type;";

        $db->pdo->exec($SQL);
    }
}