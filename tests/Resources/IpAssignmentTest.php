<?php

namespace SeanKndy\SonarApi\Tests\Resources;

use SeanKndy\SonarApi\Resources\IpAssignment;
use SeanKndy\SonarApi\Tests\TestCase;

class IpAssignmentTest extends TestCase
{
    /** @test */
    public function it_does_return_prefix_length_for_ipv4_subnet()
    {
        $ipAssignment = new IpAssignment([
            'subnet' => '123.113.121.0/24',
        ]);

        $this->assertEquals(24, $ipAssignment->prefixLength());
    }

    /** @test */
    public function it_does_return_prefix_length_for_ipv6_subnet()
    {
        $ipAssignment = new IpAssignment([
            'subnet' => '2001:0db8:8000::/34',
        ]);

        $this->assertEquals(34, $ipAssignment->prefixLength());
    }

    /** @test */
    public function it_does_return_32_prefix_length_for_ipv4_host()
    {
        $ipAssignment = new IpAssignment([
            'subnet' => '123.113.121.1',
        ]);

        $this->assertEquals(32, $ipAssignment->prefixLength());
    }

    /** @test */
    public function it_does_return_128_prefix_length_for_ipv6_host()
    {
        $ipAssignment = new IpAssignment([
            'subnet' => '2001:0db8:85a3:0000:0000:8a2e:0370:7334',
        ]);

        $this->assertEquals(128, $ipAssignment->prefixLength());
    }
}