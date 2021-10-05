<?php

namespace SeanKndy\SonarApi\Resources;

class TicketReply extends BaseResource
{
    public int $id;

    public ?string $author;

    public ?string $authorEmail;

    public string $body;

    public bool $incoming;

    public \DateTime $createdAt;

    public \DateTime $updatedAt;

    public User $user;
}