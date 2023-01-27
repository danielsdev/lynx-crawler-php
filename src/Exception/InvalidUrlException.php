<?php

declare(strict_types=1);

namespace App\Exception;

class InvalidUrlException extends \InvalidArgumentException
{
    public function __construct(?string $message = null, int $code = 0, \Throwable $previous = null)
    {
        if (null === $message) {
            $message = 'Invalid url.';
        }

        parent::__construct($message, $code, $previous);
    }
}
