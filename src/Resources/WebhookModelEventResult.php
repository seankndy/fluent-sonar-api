<?php

namespace SeanKndy\SonarApi\Resources;

class WebhookModelEventResult extends BaseResource
{
    /**
     * The model.
     */
    public string $model;

    /**
     * A list of events.
     * @var string[]
     */
    public array $events;

}