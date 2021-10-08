<?php

namespace SeanKndy\SonarApi\Types;

class Geopoint extends BaseType
{
    private string $latitude;

    private string $longitude;

    public function __construct(string $value)
    {
        if (\preg_match('/^(-?[0-9.]+)\s*,\s*(-?[0-9.]+)$/', $value, $m)) {
            $this->latitude = $m[1];
            $this->longitude = $m[2];
        } else {
            throw new \InvalidArgumentException("Invalid geopoint format, must be lat,lon");
        }
    }

    public function value(): string
    {
        return $this->latitude . ',' . $this->longitude;
    }
}