<?php

namespace SeanKndy\SonarApi\Resources;

class TicketGroup extends BaseResource
{
    public int $id;

    public string $name;

    public bool $enabled;
}