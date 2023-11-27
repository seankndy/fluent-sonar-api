<?php

namespace SeanKndy\SonarApi\Tests\Mutations;

use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\Psr7\Response;
use Illuminate\Support\Collection;
use SeanKndy\SonarApi\Client;
use SeanKndy\SonarApi\Mutations\Inputs\BaseInput;
use SeanKndy\SonarApi\Mutations\Inputs\InputBuilder;
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
    public function it_throws_exception_when_calling_mutation_method_without_array_argument()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage("Mutation argument must be an array.");

        $builder = (new MutationBuilder())->testMutation(1234);
    }

    /** @test */
    public function it_throws_exception_when_calling_run_without_client_set()
    {
        $this->expectException(\RuntimeException::class);
        $this->expectExceptionMessage("Cannot call run() without a client!");

        (new MutationBuilder())
            ->testMutation()
            ->run();
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
    public function it_does_return_collection_of_resources_when_specifying_a_return_resource_and_response_is_array()
    {
        $client = new Client(
            new GuzzleClient(['handler' => new MockHandler([
                new Response(200, [], \json_encode([
                    'data' => [
                        'testMutation' => [
                            [
                                'name' => 'Testing 1',
                            ],
                            [
                                'name' => 'Testing 2',
                            ],
                        ]
                    ],
                ]))
            ])]),
            'test_token',
            'https://dummy.com'
        );

        $resources = (new MutationBuilder($client))
            ->return(DummyResource::class)
            ->testMutation([
                'foo' => new Int64Bit(1234),
            ])->run();

        $this->assertInstanceOf(Collection::class, $resources);
        $this->assertInstanceOf(DummyResource::class, $resources[0]);
        $this->assertInstanceOf(DummyResource::class, $resources[1]);
        $this->assertEquals('Testing 1', $resources[0]->name);
        $this->assertEquals('Testing 2', $resources[1]->name);
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
                'foo3' => [new Int64Bit(1234), new Int64Bit(4567)],
                'input' => new TestMutationInput([
                    'field1' => 'testing',
                ]),
                'inline_input' => fn(InputBuilder $input): InputBuilder => $input->type('TestType')->data([
                    'field2' => 'foobar',
                ]),
            ])->getQuery();

        $variables = $this->getGraphQlQueryVariableDeclarations($query->query());
        $this->assertEquals([
            'id' => 'Int64Bit!',
            'foo1' => 'String',
            'foo2' => 'String!',
            'foo3' => '[Int64Bit]',
            'input' => 'TestMutationInput',
            'inline_input' => 'TestType',
        ], $variables);
    }

    /** @test */
    public function it_throws_exception_if_array_of_data_types_not_consistent()
    {
        $this->expectException(\RuntimeException::class);
        $this->expectExceptionMessage("Array of elements for input variable 'foo' provided must be " .
            "all of the same type, however there are types mixed.");

        (new MutationBuilder())
            ->return(DummyResource::class)
            ->testMutation([
                'foo' => [new Int64Bit(1234), new TestMutationInput(['field1' => 'testing'])],
            ])->getQuery();
    }

    /** @test */
    public function it_throws_exception_if_array_of_data_types_empty()
    {
        $this->expectException(\RuntimeException::class);
        $this->expectExceptionMessage("Array for input variable 'foo' is empty.");

        (new MutationBuilder())
            ->return(DummyResource::class)
            ->testMutation([
                'foo' => [],
            ])->getQuery();
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
                ]),
                'inline_input' => fn(InputBuilder $input): InputBuilder => $input->type('TestType')->data([
                    'field2' => 'foobar',
                ]),
            ])->getQuery();

        $this->assertMatchesRegularExpression('/mutation\(.+?\) {[\r\n\s]+testMutation\(id: \$id foo1: \$foo1 foo2: \$foo2 input: \$input inline_input: \$inline_input\)/s', (string)$query->query());
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
    public function it_does_configure_proper_selections_in_graphql_when_only_argument_given_to_return()
    {
        $query = (new MutationBuilder())
            ->return(DummyResource::class, ['id'])
            ->testMutation([
                'id!' =>  new Int64Bit('1234'),
            ])->getQuery();

        $this->assertEquals([
            'id',
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