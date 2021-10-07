<?php

namespace SeanKndy\SonarApi\Tests\Types;

use SeanKndy\SonarApi\Tests\TestCase;
use SeanKndy\SonarApi\Types\EmailAddress;

class EmailAddressTest extends TestCase
{
    /** @test */
    public function it_doesnt_allow_invalid_email()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage("'invalidemail.com' is not a valid email address.");

        new EmailAddress('invalidemail.com');
    }

    /** @test */
    public function it_does_instantiate_with_valid_email()
    {
        $this->assertInstanceOf(EmailAddress::class, new EmailAddress('test@email.com'));
        $this->assertInstanceOf(EmailAddress::class, new EmailAddress('test@some.sub.domain'));
    }
}
