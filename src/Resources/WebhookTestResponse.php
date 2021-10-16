<?php

namespace SeanKndy\SonarApi\Resources;

class WebhookTestResponse extends BaseResource
{
    /**
     * Will be true if the operation succeeded.
     */
    public bool $success;

    /**
     * The HTTP status code of the response.
     */
    public int $statusCode;

    /**
     * The response body of the webhook test.
     */
    public string $response;

}