<?php namespace Syscover\Crm\GraphQL\Mutations;

use GraphQL;
use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Mutation;
use Syscover\Core\Services\SQLService;
use Syscover\Crm\Models\Address;
use Syscover\Crm\Services\AddressService;

class AddressMutation extends Mutation
{
    public function type()
    {
        return GraphQL::type('CrmAddress');
    }

    public function args()
    {
        return [
            'object' => [
                'name' => 'object',
                'type' => Type::nonNull(GraphQL::type('CrmAddressInput'))
            ],
        ];
    }
}

class AddAddressMutation extends AddressMutation
{
    protected $attributes = [
        'name'          => 'addAddress',
        'description'   => 'Add new group'
    ];

    public function resolve($root, $args)
    {
        return AddressService::create($args['object']);
    }
}

class UpdateAddressMutation extends AddressMutation
{
    protected $attributes = [
        'name' => 'updateAddress',
        'description' => 'Update address'
    ];

    public function resolve($root, $args)
    {
        return AddressService::update($args['object'], $args['object']['id']);
    }
}

class DeleteAddressMutation extends AddressMutation
{
    protected $attributes = [
        'name' => 'deleteAddress',
        'description' => 'Delete address'
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
        $object = SQLService::deleteRecord($args['id'], Address::class);

        return $object;
    }
}
