<?php
namespace app\models;

use app\core\Model;

class Cart extends Model
{
    public int $quantity = 1;
    public int $product_id = 0;

    public function rules(): array
    {
        return [
            "quantity" => [self::RULE_REQUIRED],
            "product_id" => [self::RULE_REQUIRED],
        ];
    }


    public function labels(): array
    {
        return [
            "quantity" => "Quantidade",
            "product_id" => "ID do produto",
        ];
    }
}