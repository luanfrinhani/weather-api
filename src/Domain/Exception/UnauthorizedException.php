<?php

namespace Src\Domain\Exception;

use Exception;
use Throwable;

class UnauthorizedException extends Exception
{
    public function __construct(string $message = "Não foi possível autorizar", int $code = 401, ?Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
