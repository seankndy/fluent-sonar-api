<?php

namespace SeanKndy\SonarApi\Tests\Mutations;

use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\Psr7\Response;
use SeanKndy\SonarApi\Client;
use SeanKndy\SonarApi\Mutations\Inputs\BaseInput;
use SeanKndy\SonarApi\Mutations\MutationBuilder;
use SeanKndy\SonarApi\Resources\ResourceInterface;
use SeanKndy\SonarApi\Tests\Dummy\DummyResource;
use SeanKndy\SonarApi\Tests\TestCase;
use SeanKndy\SonarApi\Types\Int64Bit;

class MutationBuilderTest extends TestCase
{
    /** @test */
    public function it_does_return_new_instance_when_calling_return()
    {
        $builder1 = new MutationBuilder();
        $builder2 = $builder1->return(DummyResource::class);

        $this->assertNotSame($builder1, $builder2);
    }

    /** @test */
    public function it_throws_exception_when_calling_return_with_non_resource_class()
    {
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage("Argument must be null or a class that implements ".ResourceInterface::class.".");

        $builder = (new MutationBuilder())->return(Client::class); // Client is not a resource
    }

    /** @test */
    public function it_throws_exception_when_calling_mutation_method_without_argument()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage("Calling mutation expects exactly 1 argument, 0 given.");

        $builder = (new MutationBuilder())->testMutation();
    }

    /** @test */
    public function it_throws_exception_when_calling_mutation_method_without_array_argument()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage("Mutation argument must be an array.");

        $builder = (new MutationBuilder())->testMutation(1234);
    }

    /** @test */
    public function it_does_return_resource_when_specifying_a_return_resource()
    {
        $client = new Client(
            new GuzzleClient(['handler' => new MockHandler([
                new Response(200, [], \json_encode([
                    'data' => [
                        'testMutation' => [
                            'name' => 'Testing',
                        ],
                    ],
                ]))
            ])]),
            'test_token',
            'https://dummy.com'
        );

        $resource = (new MutationBuilder($client))
            ->return(DummyResource::class)
            ->testMutation([
                'foo' => new Int64Bit(1234),
            ])->run();

        $this->assertInstanceOf(DummyResource::class, $resource);
        $this->assertEquals('Testing', $resource->name);
    }

    /** @test */
    public function it_does_return_raw_response_when_no_return_resource_set()
    {
        $client = new Client(
            new GuzzleClient(['handler' => new MockHandler([
                new Response(200, [], \json_encode([
                    'data' => [
                        'testMutation' => [
                            'name' => 'Testing',
                        ],
                    ],
                ]))
            ])]),
            'test_token',
            'https://dummy.com'
        );

        $response = (new MutationBuilder($client))
            ->return(null)
            ->testMutation([
                'foo' => new Int64Bit(1234),
            ])->run();

        $this->assertEquals(\json_decode(\json_encode([
            'testMutation' => [
                'name' => 'Testing',
            ]
        ]), false), $response);
    }


    /** @test */
    public function it_does_configure_proper_variables_in_graphql()
    {
        $query = (new MutationBuilder())
            ->return(DummyResource::class)
            ->testMutation([
                'id!' =>  new Int64Bit('1234'),
                'foo1' => 'test1',
                'foo2!' => 'test2',
                'input' => new TestMutationInput([
                    'field1' => 'testing',
                ])
            ])->getQuery();

        $variables = $this->getGraphQlQueryVariableDeclarations($query->query());
        $this->assertEquals([
            'id' => 'Int64Bit!',
            'foo1' => 'String',
            'foo2' => 'String!',
            'input' => 'TestMutationInput'
        ], $variables);
    }

    /** @test */
    public function it_does_configure_proper_arguments_in_graphql()
    {
        $query = (new MutationBuilder())
            ->return(DummyResource::class)
            ->testMutation([
                'id!' =>  new Int64Bit('1234'),
                'foo1' => 'test1',
                'foo2!' => 'test2',
                'input' => new TestMutationInput([
                    'field1' => 'testing',
                ])
            ])->getQuery();

        $this->assertMatchesRegularExpression('/mutation\(.+?\) {[\r\n\s]+testMutation\(id: \$id foo1: \$foo1 foo2: \$foo2 input: \$input\)/s', (string)$query->query());
    }

    /** @test */
    public function it_does_configure_proper_selections_in_graphql()
    {
        $query = (new MutationBuilder())
            ->return(DummyResource::class)
            ->testMutation([
                'id!' =>  new Int64Bit('1234'),
            ])->getQuery();

        $this->assertEquals([
            'id',
            'name',
            'some_date_time',
        ], $query->query()->getSelectionSet());
    }

    /** @test */
    public function it_does_build_proper_variables_for_graphql()
    {
        $query = (new MutationBuilder())
            ->return(DummyResource::class)
            ->testMutation([
                'id!' =>  new Int64Bit('1234'),
                'foo1' => 'test1',
                'foo2!' => 'test2',
                'input' => new TestMutationInput([
                    'field1' => 'testing',
                ])
            ])->getQuery();

        $this->assertEquals([
            'id' => 1234,
            'foo1' => 'test1',
            'foo2' => 'test2',
            'input' => [
                'field1' => 'testing',
            ],
        ], $query->variables());
    }
}

class TestMutationInput extends BaseInput
{
    protected string $field1;
}