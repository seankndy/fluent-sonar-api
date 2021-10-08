<?php

namespace SeanKndy\SonarApi\Mutations\Inputs;

use SeanKndy\SonarApi\Types\Latitude;
use SeanKndy\SonarApi\Types\Longitude;
use SeanKndy\SonarApi\Types\Subdivision;

class CreateNetworkSiteAddressMutationInput extends BaseInput
{
    protected ?string $line1;

    protected ?string $line2;

    protected ?string $city;

    protected ?Subdivision $subdivision;

    protected ?string $zip;

    protected string $country;

    protected Latitude $latitude;

    protected Longitude $longitude;
}