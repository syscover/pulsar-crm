<?php namespace Syscover\Crm\GraphQL\Mutations;

use GraphQL;
use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Mutation;
use Syscover\Core\Services\SQLService;
use Syscover\Crm\Models\CustomerGroup;
use Syscover\Crm\Services\CustomerGroupService;

class CustomerGroupMutation extends Mutation
{
    public function type()
    {
        return GraphQL::type('CrmCustomerGroup');
    }

    public function args()
    {
        return [
            'object' => [
                'name' => 'object',
                'type' => Type::nonNull(GraphQL::type('CrmCustomerGroupInput'))
            ],
        ];
    }
}

class AddCustomerGroupMutation extends CustomerGroupMutation
{
    protected $attributes = [
        'name'          => 'addCustomerGroup',
        'description'   => 'Add new customer group'
    ];

    public function resolve($root, $args)
    {
        return CustomerGroupService::create($args['object']);
    }
}

class UpdateCustomerGroupMutation extends CustomerGroupMutation
{
    protected $attributes = [
        'name' => 'updateCustomerGroup',
        'description' => 'Update customer group'
    ];

    public function resolve($root, $args)
    {
        return CustomerGroupService::update($args['object']);
    }
}

class DeleteCustomerGroupMutation extends CustomerGroupMutation
{
    protected $attributes = [
        'name' => 'deleteCustomerGroup',
        'description' => 'Delete customer group'
    ];

    public function args()
    {
        return [
            'id' => [
                'name' => 'id',
                'type' => Type::nonNull(Type::int())
            ]
        ];
    }

    public function resolve($root, $args)
    {
        $object = SQLService::deleteRecord($args['id'], CustomerGroup::class);

        return $object;
    }
}
