<?php

namespace App\Infrastructure\Subscriber\Exception;

abstract class AbstractException extends \Exception
{
    public function __construct(string $message = "", ?\Throwable $previous = null)
    {
        parent::__construct(empty($message) ? $this->message() : $message, $this->code(), $previous);
    }

    abstract protected function message(): string;
    abstract protected function code(): int;
}