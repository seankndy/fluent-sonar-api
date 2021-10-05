<?php

namespace SeanKndy\SonarApi\Exceptions;

class SonarQueryException extends \Exception
{
    protected array $errors;

    public function __construct($message, array $errors)
    {
        parent::__construct($message, 0, null);

        $this->errors = $errors;
    }

    public function getErrors(): array
    {
        return $this->errors;
    }
}