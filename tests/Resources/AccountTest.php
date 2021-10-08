<?php

namespace SeanKndy\SonarApi\Tests\Resources;

use SeanKndy\SonarApi\Resources\Account;
use SeanKndy\SonarApi\Resources\Address;
use SeanKndy\SonarApi\Tests\TestCase;

class AccountTest extends TestCase
{
    /** @test */
    public function it_does_get_physical_address()
    {
        $jsonObject = \json_decode(\json_encode([
            'addresses' => [
                'entities' => [
                    [
                        'id' => 100,
                        'type' => 'PHYSICAL',
                        'line1' => '1234 Test Ave.',
                        'city' => 'Testing',
                        'zip' => '90210',
                        'servicable' => true,
                        'created_at' => '2021-10-01T21:10:24+00:00',
                        'updated_at' => '2021-10-01T21:10:24+00:00',
                    ],
                    [
                        'id' => 101,
                        'type' => 'MAILING',
                        'line1' => 'PO Box 7877',
                        'city' => 'Testing',
                        'zip' => '90210',
                        'servicable' => false,
                        'created_at' => '2021-10-01T21:10:24+00:00',
                        'updated_at' => '2021-10-01T21:10:24+00:00',
                    ],
                ],
            ],
        ]), false);

        $resource = Account::fromJsonObject($jsonObject);

        $physicalAddress = $resource->physicalAddress();

        $this->assertInstanceOf(Address::class, $physicalAddress);
        $this->assertEquals( 100, $physicalAddress->id);
    }

    /** @test */
    public function it_does_get_mailing_address()
    {
        $jsonObject = \json_decode(\json_encode([
            'addresses' => [
                'entities' => [
                    [
                        'id' => 100,
                        'type' => 'PHYSICAL',
                        'line1' => '1234 Test Ave.',
                        'city' => 'Testing',
                        'zip' => '90210',
                        'servicable' => true,
                        'created_at' => '2021-10-01T21:10:24+00:00',
                        'updated_at' => '2021-10-01T21:10:24+00:00',
                    ],
                    [
                        'id' => 101,
                        'type' => 'MAILING',
                        'line1' => 'PO Box 7877',
                        'city' => 'Testing',
                        'zip' => '90210',
                        'servicable' => false,
                        'created_at' => '2021-10-01T21:10:24+00:00',
                        'updated_at' => '2021-10-01T21:10:24+00:00',
                    ],
                ],
            ],
        ]), false);

        $resource = Account::fromJsonObject($jsonObject);

        $mailingAddress = $resource->mailingAddress();

        $this->assertInstanceOf(Address::class, $mailingAddress);
        $this->assertEquals( 101, $mailingAddress->id);
    }

    /** @test */
    public function it_does_return_null_when_no_mailing_address()
    {
        $jsonObject = \json_decode(\json_encode([
            'addresses' => [
                'entities' => [
                    [
                        'id' => 100,
                        'type' => 'PHYSICAL',
                        'line1' => '1234 Test Ave.',
                        'city' => 'Testing',
                        'zip' => '90210',
                        'servicable' => true,
                        'created_at' => '2021-10-01T21:10:24+00:00',
                        'updated_at' => '2021-10-01T21:10:24+00:00',
                    ],
                ],
            ],
        ]), false);

        $resource = Account::fromJsonObject($jsonObject);

        $this->assertNull($resource->mailingAddress());
    }

    /** @test */
    public function it_does_return_null_when_no_physical_address()
    {
        $jsonObject = \json_decode(\json_encode([
            'addresses' => [
                'entities' => [
                    [
                        'id' => 101,
                        'type' => 'MAILING',
                        'line1' => 'PO Box 7877',
                        'city' => 'Testing',
                        'zip' => '90210',
                        'servicable' => false,
                        'created_at' => '2021-10-01T21:10:24+00:00',
                        'updated_at' => '2021-10-01T21:10:24+00:00',
                    ],
                ],
            ],
        ]), false);

        $resource = Account::fromJsonObject($jsonObject);

        $this->assertNull($resource->physicalAddress());
    }
}