<?php
namespace app\models;

use app\core\db\DbModel;

class Sale extends DbModel
{
    private int $id_manipulate = 0;
    public int $user_id = 0;
    public float $amount = 0.0;
    public float $amount_without_tax = 0.0;
    public float $amount_with_tax = 0.0;

    public static function tableName(): string
    {
        return "sales";
    }

    public function getId(): int
    {
        return $this->id_manipulate;
    }

    public function setId(int $id): void
    {
        $this->id_manipulate = $id;
    }

    public function rules(): array
    {
        return [
            "amount" => [self::RULE_REQUIRED],
            "amount_without_tax" => [self::RULE_REQUIRED],
            "amount_with_tax" => [self::RULE_REQUIRED],
        ];
    }

    public function save()
    {
        return parent::save();
    }

    public function attributes(): array
    {
        return ["amount", "amount_without_tax", "amount_with_tax", "user_id"];
    }

    public function labels(): array
    {
        return [
            "amount" => "Total",
            "amount_without_tax" => "Total sem taxas",
            "amount_with_tax" => "Total com taxas",
        ];
    }
}