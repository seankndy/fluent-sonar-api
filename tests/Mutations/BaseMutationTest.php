<?php

namespace SeanKndy\SonarApi\Tests\Mutations;

use SeanKndy\SonarApi\Mutations\BaseMutation;
use SeanKndy\SonarApi\Mutations\Inputs\BaseInput;
use SeanKndy\SonarApi\Tests\Dummy\DummyResource;
use SeanKndy\SonarApi\Tests\TestCase;
use SeanKndy\SonarApi\Types\Int64Bit;

class BaseMutationTest extends TestCase
{
    /** @test */
    public function it_builds_query_with_properties_of_custom_type_and_string_and_input_properly()
    {
        $query = (new TestMutation(new Int64Bit(1234), 'testing', new TestMutationInput([
            'stringField' => 'test',
            'boolField' => false,
            'intField' => 1938,
        ])))->query();

        $variables = $this->getGraphQlQueryVariableDeclarations($query);

        // verify variable declarations
        $this->assertEquals([
            'id' => 'Int64Bit!',
            'someInput' => 'TestMutationInput!',
            'status' => 'String', // not required because prop is nullable
        ], $variables);

        // verify arguments
        $this->assertMatchesRegularExpression('/mutation\(.+?\) {[\r\n\s]+testMutation\(id: \$id status: \$status someInput: \$someInput\) {/', (string)$query);

        // verify selections
        $this->assertEqualsCanonicalizing([
            'id',
            'name',
            'some_date_time',
        ], $this->getGraphQlQuerySelectionsAsArray($query));
    }

    /** @test */
    public function it_returns_variables_as_properly_formatted_array()
    {
        $variables = (new TestMutation(new Int64Bit(1234), 'testing', new TestMutationInput([
            'stringField' => 'test',
            'boolField' => false,
            'intField' => 1938,
        ])))->variables();

        $this->assertEquals([
            'id' => 1234,
            'status' => 'testing',
            'someInput' => [
                'string_field' => 'test',
                'bool_field' => false,
                'int_field' => 1938,
            ]
        ], $variables);
    }

    /** @test */
    public function it_return_bare_class_name_in_camel_case_when_calling_name()
    {
        $mutation = (new TestMutation(new Int64Bit(1234), 'testing', new TestMutationInput([
            'stringField' => 'test',
            'boolField' => false,
            'intField' => 1938,
        ])));

        $this->assertEquals('testMutation', $mutation->name());

        $mutation = (new Snake_Cased_Mutation(new Int64Bit(1234), 'testing', new TestMutationInput([
            'stringField' => 'test',
            'boolField' => false,
            'intField' => 1938,
        ])));

        $this->assertEquals('snakeCasedMutation', $mutation->name());
    }
}

class TestMutation extends BaseMutation
{
    public Int64Bit $id;

    public ?string $status;

    public TestMutationInput $someInput;

    public function __construct(Int64Bit $id, string $status, TestMutationInput $someInput)
    {
        $this->id = $id;
        $this->someInput = $someInput;
        $this->status = $status;
    }

    public function returnResource(): ?string
    {
        return DummyResource::class;
    }
}

class Snake_Cased_Mutation extends BaseMutation
{
    public Int64Bit $id;

    public ?string $status;

    public TestMutationInput $someInput;

    public function __construct(Int64Bit $id, string $status, TestMutationInput $someInput)
    {
        $this->id = $id;
        $this->someInput = $someInput;
        $this->status = $status;
    }

    public function returnResource(): ?string
    {
        return DummyResource::class;
    }
}

class TestMutationInput extends BaseInput
{
    protected string $stringField;

    protected bool $boolField;

    protected int $intField;
}