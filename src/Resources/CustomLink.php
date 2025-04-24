<?php

namespace SeanKndy\SonarApi\Resources;

class CustomLink extends BaseResource implements IdentityInterface
{
    use Traits\HasIdentity;

    /**
     * The date and time this entity was created.
     */
    public \DateTime $createdAt;

    /**
     * The last date and time this entity was modified.
     */
    public \DateTime $updatedAt;

    /**
     * An icon.
     */
    public ?string $icon;

    /**
     * The color of the icon.
     */
    public ?string $iconColor;

    /**
     * A title that will be displayed for this item.
     */
    public ?string $label;

    /**
     * The model.
     */
    public string $model;

    /**
     * A descriptive name.
     */
    public string $name;

    /**
     * The URL to navigate to.
     */
    public string $url;

    /**
     * A log entry.
     * @var \SeanKndy\SonarApi\Resources\Log[]
     */
    public array $logs;

    /**
     * An access log history on an entity.
     * @var \SeanKndy\SonarApi\Resources\AccessLog[]
     */
    public array $accessLogs;

}