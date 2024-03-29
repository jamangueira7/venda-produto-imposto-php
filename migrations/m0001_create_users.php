<?php

use app\core\Application;

class m0001_create_users
{
    public function up()
    {
        $db = Application::$app->db;
        $SQL = "CREATE TABLE users (
                id serial PRIMARY KEY,
                email VARCHAR(255) NOT NULL,
                firstname VARCHAR(255) NOT NULL,
                lastname VARCHAR(255) NOT NULL,
                password VARCHAR(255) NOT NULL,
                status SMALLINT DEFAULT 0,
                type SMALLINT DEFAULT 0,
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