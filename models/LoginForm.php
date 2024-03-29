<?php
namespace app\models;

use app\core\Application;
use app\core\db\DbModel;

class LoginForm extends DbModel
{
    private int $id_manipulate = 0;
    public string $email = '';
    public string $password = '';

    public static function tableName(): string
    {
        return "users";
    }

    public function rules(): array
    {
        return [
            "email" => [
                self::RULE_REQUIRED,
                self::RULE_EMAIL
            ],
            "password" => [self::RULE_REQUIRED]
        ];
    }

    public function getId(): int
    {
        return $this->id_manipulate;
    }

    public function setId(int $id): void
    {
        $this->id_manipulate = $id;
    }

    public function login()
    {
        $user = User::findOne(['email' => $this->email]);

        if (!$user) {
            $this->addError("email", 'Usuario não existe');
            return false;
        }

        if (!password_verify($this->password, $user->password)) {
            $this->addError("password", 'Senha incorreta');
            return false;
        }

        return Application::$app->login($user);
    }

    public function attributes(): array
    {
        return ["email", "password"];
    }

    public function labels(): array
    {
        return [
            "email" => "Email",
            "password" => "Senha",
        ];
    }

}