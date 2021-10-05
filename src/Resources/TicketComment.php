<?php

namespace SeanKndy\SonarApi\Resources;

class TicketComment extends BaseResource
{
    public int $id;

    public string $body;

    public \DateTime $createdAt;

    public \DateTime $updatedAt;

    public User $user;
}