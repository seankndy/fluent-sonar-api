<?php

namespace SeanKndy\SonarApi\Resources;

class ValidatedAddress extends BaseResource
{
    /**
     * Address line 1.
     */
    public string $line1;

    /**
     * Address line 2.
     */
    public ?string $line2;

    /**
     * A city.
     */
    public string $city;

    /**
     * A state, province, or other country subdivision.
     */
    public string $subdivision;

    /**
     * A ZIP or postal code.
     */
    public string $zip;

    /**
     * A two character country code.
     */
    public string $country;

    /**
     * A decimal latitude.
     */
    public string $latitude;

    /**
     * A decimal latitude.
     */
    public string $longitude;

}