<?php namespace Syscover\Crm\GraphQL\Queries;

use GraphQL;
use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Query;
use Syscover\Core\Services\SQLService;
use Syscover\Crm\Models\CustomerGroup;

class CustomerGroupQuery extends Query
{
    protected $attributes = [
        'name'          => 'CustomerGroupQuery',
        'description'   => 'Query to get customer group'
    ];

    public function type()
    {
        return GraphQL::type('CrmCustomerGroup');
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
        $query = SQLService::getQueryFiltered(CustomerGroup::builder(), $args['sql']);

        return $query->first();
    }
}