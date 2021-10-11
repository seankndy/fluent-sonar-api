<?php

namespace SeanKndy\SonarApi\Tests\Types;

use SeanKndy\SonarApi\Tests\TestCase;
use SeanKndy\SonarApi\Types\SubnetScalar;

class SubnetScalarTest extends TestCase
{
    /** @test */
    public function it_throws_exception_when_initialized_with_invalid_ip()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage("Argument should be in CIDR format.");

        new SubnetScalar('1.1.1.256/24');
    }

    /** @test */
    public function it_throws_exception_when_initialized_without_prefix_length()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage("Argument should be in CIDR format.");

        new SubnetScalar('1.1.1.1');
    }

    /** @test */
    public function it_throws_exception_when_initialized_with_invalid_prefix_length()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage("Argument should be in CIDR format.");

        new SubnetScalar('1.1.1.1/33');
    }

    /** @test */
    public function it_throws_exception_when_initialized_with_invalid_ipv6()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage("Argument should be in CIDR format.");

        new SubnetScalar('2001:0db8:85a3::8a2e::/33'); // double ::
    }

    /** @test */
    public function it_throws_exception_when_initialized_without_v6_prefix_length()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage("Argument should be in CIDR format.");

        new SubnetScalar('2001:0db8:85a3::8a2e:0370:7334');
    }

    /** @test */
    public function it_throws_exception_when_initialized_with_invalid_v6_prefix_length()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage("Argument should be in CIDR format.");

        new SubnetScalar('2001:0db8:85a3::8a2e:0370:7334/129');
    }

    /** @test */
    public function it_initializes_with_valid_v4_cidr()
    {
        $this->assertEquals('1.1.1.0/24', (new SubnetScalar('1.1.1.0/24'))->value());
    }

    /** @test */
    public function it_initializes_with_valid_v6_cidr()
    {
        $this->assertEquals('2001:0db8:85a3::8a2e:0370:7334/33', (new SubnetScalar('2001:0db8:85a3::8a2e:0370:7334/33'))->value());
    }
}
