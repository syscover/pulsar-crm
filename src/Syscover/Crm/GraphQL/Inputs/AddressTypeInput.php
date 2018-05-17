<?php namespace Syscover\Crm\GraphQL\Inputs;

use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Type as GraphQLType;

class AddressTypeInput extends GraphQLType {

    protected $attributes = [
        'name'          => 'AddressTypeInput',
        'description'   => 'Address type that address can to belong'
    ];

    protected $inputObject = true;

    public function fields()
    {
        return [
            'id' => [
                'type' => Type::int(),
                'description' => 'The id of address type'
            ],
            'name' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'The name of address type'
            ]
        ];
    }
}