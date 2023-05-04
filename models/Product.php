<?php
namespace app\models;

use app\core\Model;

class Product extends Model
{
    public string $firstname = '';

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
}