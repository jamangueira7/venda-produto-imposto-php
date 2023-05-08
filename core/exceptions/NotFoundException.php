<?php

namespace app\core\exceptions;

class NotFoundException extends \Exception
{
    protected $message = "Pagina não encontrada";
    protected $code = 404;
}