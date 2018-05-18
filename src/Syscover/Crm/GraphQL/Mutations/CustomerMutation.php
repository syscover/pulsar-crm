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
        return GraphQL::type('CrmCustomer');
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

class AddCustomerMutation extends CustomerMutation
{
    protected $attributes = [
        'name'          => 'addCustomer',
        'description'   => 'Add new customer'
    ];

    public function resolve($root, $args)
    {
        return CustomerService::create($args['object']);
    }
}

class UpdateCustomerMutation extends CustomerMutation
{
    protected $attributes = [
        'name' => 'updateCustomer',
        'description' => 'Update customer'
    ];

    public function resolve($root, $args)
    {
        return CustomerService::update($args['object']);
    }
}

class DeleteCustomerMutation extends CustomerMutation
{
    protected $attributes = [
        'name' => 'deleteCustomer',
        'description' => 'Delete customer'
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
