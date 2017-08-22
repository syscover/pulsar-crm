<?php namespace Syscover\Crm\GraphQL;

use GraphQL;

class CrmGraphQLServiceProvider
{
    public static function bootGraphQLTypes()
    {
        // GROUP
        GraphQL::addType(\Syscover\Crm\GraphQL\Types\GroupType::class, 'CrmGroup');
        GraphQL::addType(\Syscover\Crm\GraphQL\Inputs\GroupInput::class, 'CrmGroupInput');

        // CUSTOMER
        GraphQL::addType(\Syscover\Crm\GraphQL\Types\CustomerType::class, 'CrmCustomer');
        GraphQL::addType(\Syscover\Crm\GraphQL\Inputs\CustomerInput::class, 'CrmCustomerInput');

        // TYPE
        GraphQL::addType(\Syscover\Crm\GraphQL\Types\TypeType::class, 'CrmType');
        GraphQL::addType(\Syscover\Crm\GraphQL\Inputs\TypeInput::class, 'CrmTypeInput');

        // ADDRESS
        GraphQL::addType(\Syscover\Crm\GraphQL\Types\AddressType::class, 'CrmAddress');
        GraphQL::addType(\Syscover\Crm\GraphQL\Inputs\AddressInput::class, 'CrmAddressInput');
    }

    public static function bootGraphQLSchema()
    {
        GraphQL::addSchema('default', array_merge_recursive(GraphQL::getSchemas()['default'], [
            'query' => [
                // GROUP
                'crmGroupsPagination'       => \Syscover\Crm\GraphQL\Queries\GroupsPaginationQuery::class,
                'crmGroups'                 => \Syscover\Crm\GraphQL\Queries\GroupsQuery::class,
                'crmGroup'                  => \Syscover\Crm\GraphQL\Queries\GroupQuery::class,

                // CUSTOMER
                'crmCustomersPagination'    => \Syscover\Crm\GraphQL\Queries\CustomersPaginationQuery::class,
                'crmCustomers'              => \Syscover\Crm\GraphQL\Queries\CustomersQuery::class,
                'crmCustomer'               => \Syscover\Crm\GraphQL\Queries\CustomerQuery::class,

                // TYPE
                'crmTypesPagination'        => \Syscover\Crm\GraphQL\Queries\TypesPaginationQuery::class,
                'crmTypes'                  => \Syscover\Crm\GraphQL\Queries\TypesQuery::class,
                'crmType'                   => \Syscover\Crm\GraphQL\Queries\TypeQuery::class,

                // ADDRESS
                'crmAddressesPagination'    => \Syscover\Crm\GraphQL\Queries\TypesPaginationQuery::class,
                'crmAddresses'              => \Syscover\Crm\GraphQL\Queries\TypesQuery::class,
                'crmAddress'                => \Syscover\Crm\GraphQL\Queries\TypeQuery::class,
            ],
            'mutation' => [
                // GROUP
                'crmAddGroup'               => \Syscover\Crm\GraphQL\Mutations\AddGroupMutation::class,
                'crmUpdateGroup'            => \Syscover\Crm\GraphQL\Mutations\UpdateGroupMutation::class,
                'crmDeleteGroup'            => \Syscover\Crm\GraphQL\Mutations\DeleteGroupMutation::class,

                // CUSTOMER
                'crmAddCustomer'            => \Syscover\Crm\GraphQL\Mutations\AddCustomerMutation::class,
                'crmUpdateCustomer'         => \Syscover\Crm\GraphQL\Mutations\UpdateCustomerMutation::class,
                'crmDeleteCustomer'         => \Syscover\Crm\GraphQL\Mutations\DeleteCustomerMutation::class,

                // TYPE
                'crmAddType'                => \Syscover\Crm\GraphQL\Mutations\AddTypeMutation::class,
                'crmUpdateType'             => \Syscover\Crm\GraphQL\Mutations\UpdateTypeMutation::class,
                'crmDeleteType'             => \Syscover\Crm\GraphQL\Mutations\DeleteTypeMutation::class,

                // ADDRESS
                'crmAddAddress'             => \Syscover\Crm\GraphQL\Mutations\AddAddressMutation::class,
                'crmUpdateAddress'          => \Syscover\Crm\GraphQL\Mutations\UpdateAddressMutation::class,
                'crmDeleteAddress'          => \Syscover\Crm\GraphQL\Mutations\DeleteAddressMutation::class,
            ]
        ]));
    }
}