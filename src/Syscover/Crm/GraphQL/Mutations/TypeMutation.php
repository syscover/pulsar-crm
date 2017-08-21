<?php namespace Syscover\Crm\GraphQL\Mutations;

use GraphQL;
use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Mutation;
use Syscover\Core\Services\SQLService;
use Syscover\Crm\Models\Type as CrmModelType;
use Syscover\Crm\Services\TypeService;

class TypeMutation extends Mutation
{
    public function type()
    {
        return GraphQL::type('CrmType');
    }

    public function args()
    {
        return [
            'object' => [
                'name' => 'object',
                'type' => Type::nonNull(GraphQL::type('CrmTypeInput'))
            ],
        ];
    }
}

class AddTypeMutation extends TypeMutation
{
    protected $attributes = [
        'name'          => 'addType',
        'description'   => 'Add new type'
    ];

    public function resolve($root, $args)
    {
        return TypeService::create($args['object']);
    }
}

class UpdateTypeMutation extends TypeMutation
{
    protected $attributes = [
        'name' => 'updateType',
        'description' => 'Update type'
    ];

    public function resolve($root, $args)
    {
        return TypeService::update($args['object'], $args['object']['id']);
    }
}

class DeleteTypeMutation extends TypeMutation
{
    protected $attributes = [
        'name' => 'deleteType',
        'description' => 'Delete type'
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
        $object = SQLService::destroyRecord($args['id'], CrmModelType::class);

        return $object;
    }
}
