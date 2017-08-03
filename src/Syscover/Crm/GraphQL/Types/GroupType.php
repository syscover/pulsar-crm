<?php namespace Syscover\Crm\GraphQL\Types;

use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Type as GraphQLType;

class GroupType extends GraphQLType {

    protected $attributes = [
        'name'          => 'Group',
        'description'   => 'Group that user can to belong'
    ];

    public function fields()
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'The id of group'
            ],
            'name' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'The name of group'
            ]
        ];
    }
}