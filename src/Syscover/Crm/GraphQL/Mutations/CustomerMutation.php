<?php namespace Syscover\Crm\GraphQL\Mutations;

use GraphQL;
use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Mutation;
use Syscover\Core\Services\SQLService;
use Syscover\Crm\Models\Customer;
use Syscover\Crm\Services\CustomerService;

class CustomerMutation extends Mutation
{
    public function type()
    {
        return GraphQL::type('CrmGroup');
    }

    public function args()
    {
        return [
            'object' => [
                'name' => 'object',
                'type' => Type::nonNull(GraphQL::type('CrmCustomerInput'))
            ],
        ];
    }
}

class AddCustomerMutation extends GroupMutation
{
    protected $attributes = [
        'name'          => 'addGroup',
        'description'   => 'Add new group'
    ];

    public function resolve($root, $args)
    {
        return CustomerService::create($args['object']);
    }
}

class UpdateCustomerMutation extends GroupMutation
{
    protected $attributes = [
        'name' => 'updateGroup',
        'description' => 'Update group'
    ];

    public function resolve($root, $args)
    {
        return CustomerService::update($args['object'], $args['object']['id']);
    }
}

class DeleteCustomerMutation extends GroupMutation
{
    protected $attributes = [
        'name' => 'deleteGroup',
        'description' => 'Delete group'
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
        $object = SQLService::destroyRecord($args['id'], Customer::class);

        return $object;
    }
}
