<?php

namespace SeanKndy\SonarApi\Resources;

class SnmpOverride extends BaseResource implements IdentityInterface
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
     * Whether or not this is enabled.
     */
    public bool $enabled;

    /**
     * The ID of an `InventoryItem`.
     */
    public int $inventoryItemId;

    /**
     * SNMPv3 auth passphrase
     */
    public ?string $snmp3AuthPassphrase;

    /**
     * SNMPv3 auth protocol
     */
    public ?string $snmp3AuthProtocol;

    /**
     * SNMPv3 context engine ID
     */
    public ?string $snmp3ContextEngineid;

    /**
     * SNMPv3 context name
     */
    public ?string $snmp3ContextName;

    /**
     * SNMPv3 privacy passphrase
     */
    public ?string $snmp3PrivPassphrase;

    /**
     * SNMPv3 privacy protocol
     */
    public ?string $snmp3PrivProtocol;

    /**
     * SNMPv3 security level
     */
    public ?string $snmp3SecLevel;

    /**
     * SNMP community/securityName
     */
    public ?string $snmpCommunity;

    /**
     * SNMP version
     */
    public ?string $snmpVersion;

    /**
     * An inventory item.
     */
    public ?InventoryItem $inventoryItem;

    /**
     * A note.
     * @var \SeanKndy\SonarApi\Resources\Note[]
     */
    public array $notes;

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