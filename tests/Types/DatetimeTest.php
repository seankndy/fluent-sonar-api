<?php

namespace SeanKndy\SonarApi\Tests\Types;

use SeanKndy\SonarApi\Tests\TestCase;
use SeanKndy\SonarApi\Types\Datetime;

class DatetimeTest extends TestCase
{
    /** @test */
    public function it_returns_correct_date_time_format()
    {
        $date = new Datetime('Fri, 08 Oct 2021 14:48:15 +0000');

        $this->assertEquals($date->value(), '2021-10-08T14:48:15+0000');
    }
}
