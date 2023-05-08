<?php

namespace app\core\exceptions;

class ForbiddenException extends \Exception
{
    protected $message = "Você não tem permissão para acessar essa pagina";
    protected $code = 403;
}