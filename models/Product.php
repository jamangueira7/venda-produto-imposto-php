<?php
namespace app\models;

use app\core\DbModel;

class Product extends DbModel
{
    public string $firstname = '';
    public string $lastname = '';
    public string $email = '';
    public int $status = 0;
    public string $password = '';
    public string $passwordConfirm = '';

    public static function tableName(): string
    {
        return "users";
    }

    public function register()
    {
        return "test";
    }

    public function rules(): array
    {
        return [
            "firstname" => [self::RULE_REQUIRED]
        ];
    }

    public function attributes(): array
    {
    return ["email", "firstname", "lastname", "status"];
    }
}