<?php
namespace app\models;

use app\core\UserModel;

class User extends UserModel
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

    public function save()
    {
        $this->password = password_hash($this->password, PASSWORD_DEFAULT);
        return parent::save();
    }

    public function change(int $id)
    {
        $this->password = password_hash($this->password, PASSWORD_DEFAULT);
        return parent::change($id);
    }

    public function attributes(): array
    {
        return ["email", "firstname", "lastname", "status", "password"];
    }

    public function labels(): array
    {
        return [
            "email" => "Email",
            "firstname" => "Nome",
            "lastname" => "Sobrenome",
            "status" => "Status",
            "password" => "Senha",
            "passwordConfirm" => "Confirme senha"
        ];
    }

    public function getDisplayName(): string
    {
        return $this->firstname . " " . $this->lastname;
    }
}