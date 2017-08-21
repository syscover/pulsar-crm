<?php namespace Syscover\Crm\GraphQL\Inputs;

use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Type as GraphQLType;

class TypeInput extends GraphQLType {

    protected $attributes = [
        'name'          => 'TypeInput',
        'description'   => 'Type that address can to belong'
    ];

    protected $inputObject = true;

    public function fields()
    {
        return [
            'id' => [
                'type' => Type::int(),
                'description' => 'The id of type'
            ],
            'name' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'The name of type'
            ]
        ];
    }
}