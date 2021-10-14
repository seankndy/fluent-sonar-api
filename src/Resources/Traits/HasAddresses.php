<?php

namespace SeanKndy\SonarApi\Resources\Traits;

use SeanKndy\SonarApi\Resources\Address;

trait HasAddresses
{
    /**
     * @var \SeanKndy\SonarApi\Resources\Address[]
     */
    public array $addresses;

    public function physicalAddress(): ?Address
    {
        foreach ($this->addresses as $address) {
            if ($address->type === 'PHYSICAL') {
                return $address;
            }
        }
        return null;
    }

    public function mailingAddress(): ?Address
    {
        foreach ($this->addresses as $address) {
            if ($address->type === 'MAILING') {
                return $address;
            }
        }
        return null;
    }
}