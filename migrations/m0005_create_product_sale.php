<?php

use app\core\Application;

class m0005_create_product_sale
{
    public function up()
    {
        $db = Application::$app->db;
        $SQL = "CREATE TABLE product_sale (
                product_id INT NOT NULL,
                sale_id INT NOT NULL,
                product_quantity INT NOT NULL,
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
            );";

        $db->pdo->exec($SQL);
    }

    public function down()
    {
        $db = Application::$app->db;
        $SQL = "DROP TABLE product_sale;";

        $db->pdo->exec($SQL);
    }
}