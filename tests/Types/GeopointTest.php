<?php

namespace SeanKndy\SonarApi\Tests\Types;

use SeanKndy\SonarApi\Tests\TestCase;
use SeanKndy\SonarApi\Types\Date;
use SeanKndy\SonarApi\Types\Geopoint;

class GeopointTest extends TestCase
{
    /** @test */
    public function it_throws_exception_when_instantiated_with_invalid_lat_lon_format()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectErrorMessage("Invalid geopoint format, must be lat,lon");

        new Geopoint('41.2812630000 -107.5581190000');
    }

    /** @test */
    public function it_returns_lat_lon_formatted_properly()
    {
        $geo = new Geopoint('41.2812630000, -107.5581190000');

        $this->assertEquals('41.2812630000,-107.5581190000', $geo->value());
    }
}
