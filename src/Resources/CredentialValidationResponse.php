<?php

namespace SeanKndy\SonarApi\Resources;

class CredentialValidationResponse extends BaseResource
{
    /**
     * The status of the validation attempt.
     */
    public bool $status;

    /**
     * Any message returned from the device upon attempted credential validation.
     */
    public ?string $message;

}