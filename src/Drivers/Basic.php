<?php

namespace Mehradsadeghi\TokenGenerator\Drivers;

use Mehradsadeghi\TokenGenerator\TokenGeneratorContract;

class Basic implements TokenGeneratorContract
{
    const ALLOWED_CHARS = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

    private $length;

    public function __construct($length)
    {
        $this->length = $length;
    }

    public function generate(): string
    {
        return $this->generateRandomString($this->length);
    }

    private function generateRandomString($length)
    {
        $allowedInputLength = strlen(self::ALLOWED_CHARS);

        $randomString = '';

        for ($i = 0; $i < $length; $i++) {
            $randomChar = self::ALLOWED_CHARS[mt_rand(0, $allowedInputLength - 1)];
            $randomString .= $randomChar;
        }

        return $randomString;
    }
}
