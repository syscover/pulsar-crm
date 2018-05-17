<?php namespace Syscover\Crm\GraphQL\Queries;

use GraphQL;
use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Query;
use Syscover\Core\Services\SQLService;
use Syscover\Crm\Models\AddressType as CrmModelType;

class AddressTypeQuery extends Query
{
    protected $attributes = [
        'name'          => 'AddressTypeQuery',
        'description'   => 'Query to get address type'
    ];

    public function type()
    {
        return GraphQL::type('CrmAddressType');
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

        return $query->first();
    }
}