<?php
namespace app\models;

use app\core\db\DbModel;

class Product extends DbModel
{

    public string $name = '';
    public string $description = '';
    public string $image = '';
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
        return ["name", "description", "price", "product_type_id", "image"];
    }

    public function labels(): array
    {
        return [
            "name" => "Nome",
            "image" => "Imagem",
            "description" => "Descrição",
            "price" => "Preço",
            "product_type_id" => "Tipo do produto"
        ];
    }

    public function prepareData($cart): array
    {
        $product_type = new ProductType();
        $products = [];

        foreach ($cart as $item) {

            $val = $this->findOne(["id" => $item['product_id']]);
            $type = $product_type->findOne(["id" => $val->product_type_id]);
            $price_quantity =  $item['quantity'] * $val->price;
            $price_tax = ($price_quantity * $type->tax) / 100;
            $total = $price_tax + $price_quantity;
            $products[$val->id] = [
                "id" => $val->id,
                "name" => $val->name,
                "image" => $val->image,
                "quantity" => $item['quantity'],
                "price" => $val->price,
                "price_quantity" => $price_quantity,
                "tax" => $type->tax,
                "tax_value" => $price_tax,
                "price_tax" => $total,
            ];

        }
        return $products;
    }
}