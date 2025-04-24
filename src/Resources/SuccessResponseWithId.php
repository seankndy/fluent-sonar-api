<?php

namespace SeanKndy\SonarApi\Resources;

class SuccessResponseWithId extends BaseResource implements IdentityInterface
{
    use Traits\HasIdentity;

    /**
     * Will be true if the operation succeeded.
     */
    public bool $success;

    /**
     * The message.
     */
    public ?string $message;

}