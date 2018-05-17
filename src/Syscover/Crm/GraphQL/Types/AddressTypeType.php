<?php namespace Syscover\Crm\GraphQL\Types;

use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Type as GraphQLType;

class AddressTypeType extends GraphQLType {

    protected $attributes = [
        'name'          => 'AddressType',
        'description'   => 'Address type that address can to belong'
    ];

    public function fields()
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'The id of address type'
            ],
            'name' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'The name of address type'
            ]
        ];
    }
}