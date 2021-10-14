<?php

namespace SeanKndy\SonarApi\Resources;

class SuccessResponse implements ResourceInterface
{
    public bool $success;

    public ?string $message;

    public function __construct(bool $success, string $message = null)
    {
        $this->success = $success;
        $this->message = $message;
    }

    public static function fromJsonObject(object $jsonObject): ResourceInterface
    {
        return new self($jsonObject->success, $jsonObject->message);
    }
}