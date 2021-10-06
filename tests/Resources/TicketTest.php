<?php

namespace SeanKndy\SonarApi\Tests\Resources;

use SeanKndy\SonarApi\Resources\Ticket;
use SeanKndy\SonarApi\Resources\TicketReply;
use SeanKndy\SonarApi\Tests\TestCase;

class TicketTest extends TestCase
{
    /** @test */
    public function it_does_get_latest_reply()
    {
        $jsonObject = \json_decode(\json_encode([
            'ticket_replies' => [
                'entities' => [
                    [
                        'id' => 100,
                        'author' => 'Jane Doe',
                        'author_email' => 'jane@test.com',
                        'body' => 'Testing 1',
                        'incoming' => true,
                        'created_at' => '2021-10-01T21:10:24+00:00',
                        'updated_at' => '2021-10-01T21:10:24+00:00',
                    ],
                    [
                        'id' => 99,
                        'author' => 'Jane Doe',
                        'author_email' => 'jane@test.com',
                        'body' => 'Testing 3',
                        'incoming' => true,
                        'created_at' => '2021-11-01T21:10:24+00:00',
                        'updated_at' => '2021-11-01T21:10:24+00:00',
                    ],
                    [
                        'id' => 101,
                        'author' => 'Jane Doe',
                        'author_email' => 'jane@test.com',
                        'body' => 'Testing 2',
                        'incoming' => true,
                        'created_at' => '2021-09-01T21:10:24+00:00',
                        'updated_at' => '2021-09-01T21:10:24+00:00',
                    ],
                ],
            ],
        ]), false);

        $resource = Ticket::fromJsonObject($jsonObject);

        $latestReply = $resource->latestReply();

        $this->assertInstanceOf(TicketReply::class, $latestReply);
        $this->assertEquals( 99, $latestReply->id);
    }
}