<?php

namespace SeanKndy\SonarApi\Tests\Types;

use SeanKndy\SonarApi\Tests\TestCase;
use SeanKndy\SonarApi\Types\Date;

class DateTest extends TestCase
{
    /** @test */
    public function it_returns_correct_date_format()
    {
        $date = new Date('2021-10-08T14:48:15+0000');

        $this->assertEquals($date->value(), '2021-10-08');
    }
}
