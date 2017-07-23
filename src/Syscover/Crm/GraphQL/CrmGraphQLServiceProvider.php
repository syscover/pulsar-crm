<?php namespace Syscover\Crm\GraphQL;

use GraphQL;

class CrmGraphQLServiceProvider
{
    public static function bootGraphQLTypes()
    {
        // GROUP
        GraphQL::addType(\Syscover\Crm\GraphQL\Types\GroupType::class, 'CrmGroup');
        GraphQL::addType(\Syscover\Crm\GraphQL\Inputs\GroupInput::class, 'CrmGroupInput');
    }

    public static function bootGraphQLSchema()
    {
        GraphQL::addSchema('default', array_merge_recursive(GraphQL::getSchemas()['default'], [
            'query' => [
                // GROUP
                'crmGroupsPagination'        => \Syscover\Crm\GraphQL\Queries\GroupsPaginationQuery::class,
                'crmGroups'                  => \Syscover\Crm\GraphQL\Queries\GroupsQuery::class,
                'crmGroup'                   => \Syscover\Crm\GraphQL\Queries\GroupQuery::class,
            ],
            'mutation' => [
                // GROUP
                'crmAddGroup'                => \Syscover\Crm\GraphQL\Mutations\AddGroupMutation::class,
                'crmUpdateGroup'             => \Syscover\Crm\GraphQL\Mutations\UpdateGroupMutation::class,
                'crmDeleteGroup'             => \Syscover\Crm\GraphQL\Mutations\DeleteGroupMutation::class,
            ]
        ]));
    }
}