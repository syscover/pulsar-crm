<?php namespace Syscover\Crm\GraphQL\Types;

use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Type as GraphQLType;

class TypeType extends GraphQLType {

    protected $attributes = [
        'name'          => 'Type',
        'description'   => 'Type that address can to belong'
    ];

    public function fields()
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'The id of type'
            ],
            'name' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'The name of type'
            ]
        ];
    }
}