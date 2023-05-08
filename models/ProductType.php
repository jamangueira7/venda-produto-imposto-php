<?php
namespace app\models;

use app\core\UserModel;

class ProductType extends UserModel
{
    public string $name = '';
    public string $description = '';
    public float $tax = 0.0;

    public static function tableName(): string
    {
        return "product_type";
    }

    public function rules(): array
    {
        return [
            "name" => [self::RULE_REQUIRED, [self::RULE_UNIQUE, 'class' => self::class]],
            "description" => [self::RULE_REQUIRED],
            "tax" => [self::RULE_REQUIRED],
        ];
    }

    public function save()
    {
        var_dump($this->tax);
        return parent::save();
    }

    public function attributes(): array
    {
        return ["name", "description", "tax"];
    }

    public function labels(): array
    {
        return [
            "name" => "Nome do tipo",
            "description" => "Descrição",
            "tax" => "Procentagem"
        ];
    }

    public function getDisplayName(): string
    {
        return $this->name;
    }
}