<?php namespace Syscover\Crm\GraphQL\Queries;

use GraphQL;
use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Query;
use Syscover\Core\Services\SQLService;
use Syscover\Crm\Models\Group;

class CustomerQuery extends Query
{
    protected $attributes = [
        'name'          => 'GroupQuery',
        'description'   => 'Query to get group'
    ];

    public function type()
    {
        return GraphQL::type('CrmGroup');
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
        $query = SQLService::getQueryFiltered(Group::builder(), $args['sql']);

        return $query->first();
    }
}