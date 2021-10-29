<?php

namespace SeanKndy\SonarApi\Tests\Resources;

use SeanKndy\SonarApi\Resources\Address;
use SeanKndy\SonarApi\Tests\TestCase;

class AddressTest extends TestCase
{
    /** @test */
    public function it_does_return_properly_formatted_string_representation()
    {
        $address = new Address([
            'line1' => '1234 Testing Ave.',
            'line2' => 'Suite B',
            'city' => 'San Diego',
            'subdivision' => 'US_CA',
            'zip' => '22400',
        ]);

        $this->assertEquals('1234 Testing Ave., Suite B, San Diego, US_CA 22400', (string)$address);
    }

    /** @test */
    public function it_does_return_properly_formatted_string_representation_when_line2_empty()
    {
        $address = new Address([
            'line1' => '1234 Testing Ave.',
            'line2' => '',
            'city' => 'San Diego',
            'subdivision' => 'US_CA',
            'zip' => '22400',
        ]);

        $this->assertEquals('1234 Testing Ave., San Diego, US_CA 22400', (string)$address);
    }
}