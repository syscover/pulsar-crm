<?php namespace Syscover\Crm\GraphQL\Mutations;

use GraphQL;
use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Mutation;
use Syscover\Core\Services\SQLService;
use Syscover\Crm\Models\Group;
use Syscover\Crm\Services\GroupService;

class GroupMutation extends Mutation
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
                'type' => Type::nonNull(GraphQL::type('CrmGroupInput'))
            ],
        ];
    }
}

class AddGroupMutation extends GroupMutation
{
    protected $attributes = [
        'name'          => 'addGroup',
        'description'   => 'Add new group'
    ];

    public function resolve($root, $args)
    {
        return GroupService::create($args['object']);
    }
}

class UpdateGroupMutation extends GroupMutation
{
    protected $attributes = [
        'name' => 'updateGroup',
        'description' => 'Update group'
    ];

    public function resolve($root, $args)
    {
        return GroupService::update($args['object']);
    }
}

class DeleteGroupMutation extends GroupMutation
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
        $object = SQLService::destroyRecord($args['id'], Group::class);

        return $object;
    }
}
