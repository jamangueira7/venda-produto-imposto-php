<?php

namespace app\core\db;

use app\core\Application;

class Database
{
    public \PDO $pdo;
    public function __construct(array $config)
    {
        $dsn = $config['dsn'] ?? "";
        $user = $config['user'] ?? "";
        $password = $config['password'] ?? "";

        $this->pdo = new \PDO($dsn, $user, $password);
        $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    }

    public function applyMigrations()
    {
        $this->createMigrationsTable();
        $applied_migrations = $this->getAppliedMigrations();

        $new_migrations = [];
        $files = scandir(Application::$ROOT_DIR . '/migrations');
        $to_apply_migrations = array_diff($files, $applied_migrations);
        foreach ($to_apply_migrations as $migration) {
            if ($migration === '.' || $migration === '..') {
                continue;
            }

            require_once Application::$ROOT_DIR . '/migrations/' . $migration;
            $class_name = pathinfo($migration, PATHINFO_FILENAME);
            $instance = new $class_name();
            $this->log("Applying migration $migration");
            $instance->up();
            $this->log("Applied migration $migration");
            $new_migrations[] = $migration;
        }

        if (!empty($new_migrations)) {
            $this->saveMigrations($new_migrations);
        } else {
            $this->log("There are no migrations to apply");
        }
    }

    public function createMigrationsTable()
    {
        $this->pdo->exec("CREATE TABLE IF NOT EXISTS migrations (
            id serial PRIMARY KEY,
            migration VARCHAR(255),
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        );");
    }

    protected function getAppliedMigrations()
    {
        $statement = $this->pdo->prepare("SELECT migration FROM migrations");
        $statement->execute();

        return $statement->fetchAll(\PDO::FETCH_COLUMN);
    }

    protected function saveMigrations(array $newMigrations)
    {
        $str = implode(',', array_map(fn($m) => "('$m')", $newMigrations));
        $statement = $this->pdo->prepare("INSERT INTO migrations (migration) VALUES 
            $str
        ");
        $statement->execute();
    }

    public function prepare($sql): \PDOStatement
    {
        return $this->pdo->prepare($sql);
    }

    private function log($message)
    {
        echo "[" . date("Y-m-d H:i:s") . "] - " . $message . PHP_EOL;
    }
}