<?php
namespace app\models;

use app\core\UserModel;

class Product extends UserModel
{

    public string $name = '';
    public string $description = '';
    public float $price = 0.0;
    public int $status = 0;
    public int $product_type_id = 0;

    public static function tableName(): string
    {
        return "products";
    }

    public function rules(): array
    {
        return [
            "name" => [self::RULE_REQUIRED, [self::RULE_UNIQUE, 'class' => self::class]],
            "description" => [self::RULE_REQUIRED],
            "price" => [self::RULE_REQUIRED],
            "product_type_id" => [self::RULE_REQUIRED],
        ];
    }

    public function save()
    {
        return parent::save();
    }

    public function change(int $id)
    {
        return parent::change($id);
    }

    public function attributes(): array
    {
        return ["name", "description", "price", "product_type_id"];
    }

    public function labels(): array
    {
        return [
            "name" => "Nome",
            "description" => "Descrição",
            "price" => "Preço",
            "product_type_id" => "Tipo do produto"
        ];
    }

    public function getDisplayName(): string
    {
        return $this->name;
    }
}