<?php

namespace SeanKndy\SonarApi\Resources;

use SeanKndy\SonarApi\Resources\Traits\HasIdentity;

class User extends BaseResource implements IdentityInterface
{
    use HasIdentity;

    /**
     * The date and time this entity was created.
     */
    public \DateTime $createdAt;

    /**
     * The last date and time this entity was modified.
     */
    public \DateTime $updatedAt;

    /**
     * Whether or not the user has completed the setup process.
     */
    public bool $completedSetup;

    /**
     * An email address.
     */
    public string $emailAddress;

    /**
     * Whether or not this is enabled.
     */
    public bool $enabled;

    /**
     * Whether or not this user is a Sonar employee.
     */
    public ?bool $isSonarStaff;

    /**
     * A supported language.
     */
    public ?string $language;

    /**
     * A mobile phone number. This will be used to send SMS messages.
     */
    public ?string $mobileNumber;

    /**
     * A descriptive name.
     */
    public string $name;

    /**
     * The publicly viewable name of this user.
     */
    public string $publicName;

    /**
     * The ID of a Role.
     */
    public ?int $roleId;

    /**
     * Super admins receive all system permissions automatically, regardless of their role.
     */
    public bool $superAdmin;

    /**
     * A username, used for authentication.
     */
    public string $username;

    /**
     * A role defines the permission set that a user has.
     */
    public ?Role $role;

    /**
     * An email.
     * @var \SeanKndy\SonarApi\Resources\Email[]
     */
    public array $emails;

    /**
     * An inventory item.
     * @var \SeanKndy\SonarApi\Resources\InventoryItem[]
     */
    public array $inventoryItems;

    /**
     * A generic inventory item.
     * @var \SeanKndy\SonarApi\Resources\GenericInventoryItem[]
     */
    public array $genericInventoryItems;

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

    /**
     * A debit.
     * @var \SeanKndy\SonarApi\Resources\Debit[]
     */
    public array $debits;

    /**
     * A discount.
     * @var \SeanKndy\SonarApi\Resources\Discount[]
     */
    public array $discounts;

    /**
     * A task.
     * @var \SeanKndy\SonarApi\Resources\Task[]
     */
    public array $tasks;

    /**
     * A note.
     * @var \SeanKndy\SonarApi\Resources\Note[]
     */
    public array $notes;

    /**
     * A record a `Payment` reversal.
     * @var \SeanKndy\SonarApi\Resources\ReversedPayment[]
     */
    public array $reversedPayments;

    /**
     * A record of a refund applied to a `Payment`.
     * @var \SeanKndy\SonarApi\Resources\RefundedPayment[]
     */
    public array $refundedPayments;

    /**
     * A ticket.
     * @var \SeanKndy\SonarApi\Resources\Ticket[]
     */
    public array $tickets;

    /**
     * A reply on a `Ticket`.
     * @var \SeanKndy\SonarApi\Resources\TicketReply[]
     */
    public array $ticketReplies;

    /**
     * A comment on a `Ticket`.
     * @var \SeanKndy\SonarApi\Resources\TicketComment[]
     */
    public array $ticketComments;

    /**
     * An override to a particular day and time a `ScheduleBlocker` would otherwise cover.
     * @var \SeanKndy\SonarApi\Resources\ScheduleBlockerOverride[]
     */
    public array $scheduleBlockerOverrides;

    /**
     * The record of a check in to a `Job`.
     * @var \SeanKndy\SonarApi\Resources\JobCheckIn[]
     */
    public array $jobCheckIns;

    /**
     * A single PDF containing multiple invoices for printing.
     * @var \SeanKndy\SonarApi\Resources\PrintedInvoiceBatch[]
     */
    public array $printedInvoiceBatches;

    /**
     * A `Notification`.
     * @var \SeanKndy\SonarApi\Resources\Notification[]
     */
    public array $notifications;

    /**
     * A user-defined search filter that applies to a specific type of entity.
     * @var \SeanKndy\SonarApi\Resources\SearchFilter[]
     */
    public array $searchFilters;

    /**
     * The relationship between an order group and a user.
     * @var \SeanKndy\SonarApi\Resources\OrderGroupUser[]
     */
    public array $orderGroupUsers;

    /**
     * A vehicle.
     * @var \SeanKndy\SonarApi\Resources\Vehicle[]
     */
    public array $vehicles;

    /**
     * Availability for `Job`s to be scheduled.
     * @var \SeanKndy\SonarApi\Resources\ScheduleAvailability[]
     */
    public array $scheduleAvailabilities;

    /**
     * Time off that removes availability from a `ScheduleAvailability`.
     * @var \SeanKndy\SonarApi\Resources\ScheduleTimeOff[]
     */
    public array $scheduleTimeOffs;

    /**
     * An event that blocks off part of a calendar otherwise availability due to `ScheduleAvailability`.
     * @var \SeanKndy\SonarApi\Resources\ScheduleBlocker[]
     */
    public array $scheduleBlockers;

    /**
     * A job, typically in the field.
     * @var \SeanKndy\SonarApi\Resources\Job[]
     */
    public array $jobs;

    /**
     * The geographical point that a technician starts or ends their day at.
     * @var \SeanKndy\SonarApi\Resources\ScheduleAddress[]
     */
    public array $scheduleAddresses;

    /**
     * An alerting rotation.
     * @var \SeanKndy\SonarApi\Resources\AlertingRotation[]
     */
    public array $alertingRotations;

    /**
     * A ticket group.
     * @var \SeanKndy\SonarApi\Resources\TicketGroup[]
     */
    public array $ticketGroups;

}
