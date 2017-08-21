<?php namespace Syscover\Crm\GraphQL\Queries;

use GraphQL;
use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Query;
use Syscover\Core\Services\SQLService;
use Syscover\Crm\Models\Type as CrmModelType;

class TypesPaginationQuery extends Query
{
    protected $attributes = [
        'name'          => 'TypesPaginationQuery',
        'description'   => 'Query to get types list.'
    ];

    public function type()
    {
        return GraphQL::type('CoreObjectPagination');
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
        $query = SQLService::getQueryFiltered(CrmModelType::builder(), $args['sql']);

        // count records filtered
        $filtered = $query->count();

        // N total records
        $total = SQLService::countPaginateTotalRecords(CrmModelType::builder());

        return (Object) [
            'total'     => $total,
            'filtered'  => $filtered,
            'query'     => $query
        ];
    }
}