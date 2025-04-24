<?php

namespace SeanKndy\SonarApi\Resources;

class Me extends BaseResource implements IdentityInterface
{
    use Traits\HasIdentity;

    /**
     * A descriptive name.
     */
    public string $name;

    /**
     * A username, used for authentication.
     */
    public string $username;

    /**
     * The publicly viewable name of this user.
     */
    public string $publicName;

    /**
     * Super admins receive all system permissions automatically, regardless of their role.
     */
    public bool $superAdmin;

    /**
     * The ID of a Role.
     */
    public ?int $roleId;

    /**
     * An email address.
     */
    public string $emailAddress;

    /**
     * A mobile phone number. This will be used to send SMS messages.
     */
    public ?string $mobileNumber;

    /**
     * The preferred language for this user. If none is set, then the system default will be used. This will affect the interface, as well as communications sent to this user.
     */
    public string $language;

    /**
     * A role defines the permission set that a user has.
     */
    public ?Role $role;

    /**
     * Your personal notification settings.
     * @var \SeanKndy\SonarApi\Resources\NotificationSetting[]
     */
    public array $notificationSettings;

    /**
     * Your personal preferences. Affects the look and behavior of Sonar specifically for you.
     */
    public UserPreference $userPreferences;

    /**
     * Whether or not a report builder license is granted.
     */
    public bool $reportBuilder;

    /**
     * Whether or not a report viewer license is granted.
     */
    public bool $reportViewer;

    /**
     * A list of `RecentItem`s that you've viewed.
     * @var \SeanKndy\SonarApi\Resources\RecentItem[]
     */
    public array $recentItems;

    /**
     * A vehicle.
     * @var \SeanKndy\SonarApi\Resources\Vehicle[]
     */
    public array $vehicles;

    /**
     * Your personal authentication factors.
     * @var \SeanKndy\SonarApi\Resources\AuthenticationFactor[]
     */
    public array $authenticationFactors;

}