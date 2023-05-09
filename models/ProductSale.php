<?php
namespace app\models;

use app\core\db\DbModel;

class ProductSale extends DbModel
{
    private int $id_manipulate = 0;
    public int $product_id = 0;
    public int $sale_id = 0;
    public int $product_quantity = 0;
    public float $price = 0.0;
    public float $tax = 0.0;

    public function getId(): int
    {
        return $this->id_manipulate;
    }

    public function setId(int $id): void
    {
        $this->id_manipulate = $id;
    }

    public static function tableName(): string
    {
        return "product_sale";
    }

    public function rules(): array
    {
        return [
            "product_id" => [self::RULE_REQUIRED],
            "sale_id" => [self::RULE_REQUIRED],
            "product_quantity" => [self::RULE_REQUIRED],
            "price" => [self::RULE_REQUIRED],
            "tax" => [self::RULE_REQUIRED],
        ];
    }

    public function save()
    {
        return parent::save();
    }

    public function attributes(): array
    {
        return ["product_id", "sale_id", "product_quantity", "price", "tax"];
    }

    public function labels(): array
    {
        return [
            "product_id" => "ID do produto",
            "sale_id" => "ID da venda",
            "product_quantity" => "Quantidade",
            "price" => "Preço",
            "tax" => "imposto",
        ];
    }
}