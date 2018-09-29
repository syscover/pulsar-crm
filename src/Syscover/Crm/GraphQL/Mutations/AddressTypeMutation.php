<?php namespace Syscover\Crm\GraphQL\Mutations;

use GraphQL;
use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Mutation;
use Syscover\Core\Services\SQLService;
use Syscover\Crm\Models\AddressType;
use Syscover\Crm\Services\AddressTypeService;

class AddressTypeMutation extends Mutation
{
    public function type()
    {
        return GraphQL::type('CrmAddressType');
    }

    public function args()
    {
        return [
            'object' => [
                'name' => 'object',
                'type' => Type::nonNull(GraphQL::type('CrmAddressTypeInput'))
            ],
        ];
    }
}

class AddAddressTypeMutation extends AddressTypeMutation
{
    protected $attributes = [
        'name'          => 'addAddressType',
        'description'   => 'Add new address type'
    ];

    public function resolve($root, $args)
    {
        return AddressTypeService::create($args['object']);
    }
}

class UpdateAddressTypeMutation extends AddressTypeMutation
{
    protected $attributes = [
        'name' => 'updateAddressType',
        'description' => 'Update address type'
    ];

    public function resolve($root, $args)
    {
        return AddressTypeService::update($args['object'], $args['object']['id']);
    }
}

class DeleteAddressTypeMutation extends AddressTypeMutation
{
    protected $attributes = [
        'name' => 'deleteAddressType',
        'description' => 'Delete address type'
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
        $object = SQLService::deleteRecord($args['id'], AddressType::class);

        return $object;
    }
}
