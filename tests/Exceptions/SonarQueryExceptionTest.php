<?php

namespace SeanKndy\SonarApi\Tests\Exceptions;

use SeanKndy\SonarApi\Exceptions\SonarQueryException;
use SeanKndy\SonarApi\Tests\TestCase;

class SonarQueryExceptionTest extends TestCase
{
    /** @test */
    public function it_can_be_instantiated_with_errors()
    {
        $exception = new SonarQueryException('uh oh', [
            'error1' => "Error 1",
            'error2' => "Error 2",
        ]);

        $this->assertEquals([
            'error1' => "Error 1",
            'error2' => "Error 2",
        ], $exception->getErrors());
    }
}