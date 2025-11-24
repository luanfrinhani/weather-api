<?php

namespace Src\Domain\Processor;

use Src\Domain\Exception\BadRequestException;
use Src\Domain\Exception\UnauthorizedException;

abstract class ExceptionStrategyProcessor
{
    /**
     * @throws UnauthorizedException|BadRequestException
     */
    public static function process(int $code)
    {
        return match ($code) {
            400 => throw new BadRequestException(),
            401 => throw new UnauthorizedException(),
        };
    }
}
