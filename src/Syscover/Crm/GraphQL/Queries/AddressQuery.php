<?php namespace Syscover\Crm\GraphQL\Queries;

use GraphQL;
use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Query;
use Syscover\Core\Services\SQLService;
use Syscover\Crm\Models\Address;

class AddressQuery extends Query
{
    protected $attributes = [
        'name'          => 'AddressQuery',
        'description'   => 'Query to get group'
    ];

    public function type()
    {
        return GraphQL::type('CrmAddress');
    }

    public function args()
    {
        return [
            'sql' => [
                'name'          => 'sql',
                'type'          => Type::listOf(GraphQL::type('CoreSQLQueryInput')),
                'description'   => 'Field to add SQL operations'
            ]
        ];
    }

    public function resolve($root, $args)
    {
        $query = SQLService::getQueryFiltered(Address::builder(), $args['sql']);

        return $query->first();
    }
}