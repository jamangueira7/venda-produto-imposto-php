<?php

use app\core\Application;

class m0004_create_sales
{
    public function up()
    {
        $db = Application::$app->db;
        $SQL = "CREATE TABLE sales (
                id serial PRIMARY KEY,
                amount FLOAT NOT NULL,
                user_id INT NOT NULL,
                amount_without_tax FLOAT NOT NULL,
                amount_with_tax FLOAT NOT NULL,
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
            );";

        $db->pdo->exec($SQL);
    }

    public function down()
    {
        $db = Application::$app->db;
        $SQL = "DROP TABLE users;";

        $db->pdo->exec($SQL);
    }
}