<?php
namespace app\models;

use app\core\DbModel;

class User extends DbModel
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

    public function rules(): array
    {
        return [
            "firstname" => [self::RULE_REQUIRED],
            "lastname" => [self::RULE_REQUIRED],
            "email" => [
                self::RULE_REQUIRED,
                self::RULE_EMAIL,
                [self::RULE_UNIQUE, 'class' => self::class]
            ],
            "password" => [self::RULE_REQUIRED, [self::RULE_MIN, 'min' => 6],  [self::RULE_MAX, 'max' => 24]],
            "passwordConfirm" => [self::RULE_REQUIRED, [self::RULE_MATCH, 'match' => 'password']],
        ];
    }

    public function attributes(): array
    {
        return ["email", "firstname", "lastname", "status", "password", "passwordConfirm"];
    }
}