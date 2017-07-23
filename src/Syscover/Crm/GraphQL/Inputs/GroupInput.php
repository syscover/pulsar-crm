<?php namespace Syscover\Crm\GraphQL\Inputs;

use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Type as GraphQLType;

class GroupInput extends GraphQLType
{
    protected $attributes = [
        'name'          => 'GroupInput',
        'description'   => 'Group that user can to belong'
    ];

    protected $inputObject = true;

    public function fields()
    {
        return [
            'id' => [
                'type' => Type::int(),
                'description' => 'The id of section'
            ],
            'name' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'The name of section'
            ]
        ];
    }
}