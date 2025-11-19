<?php

namespace Src\Infrastructure\Utils;

class ConfigLaravel
{
    public function get(string $key, mixed $default = null)
    {
        return config($key, $default);
    }
}
