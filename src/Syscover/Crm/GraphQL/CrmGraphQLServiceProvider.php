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

        // ADDRESS TYPE
        GraphQL::addType(\Syscover\Crm\GraphQL\Types\AddressTypeType::class, 'CrmAddressType');
        GraphQL::addType(\Syscover\Crm\GraphQL\Inputs\AddressTypeInput::class, 'CrmAddressTypeInput');

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

                // ADDRESS TYPE
                'crmAddressTypesPagination' => \Syscover\Crm\GraphQL\Queries\AddressTypesPaginationQuery::class,
                'crmAddressTypes'           => \Syscover\Crm\GraphQL\Queries\AddressTypesQuery::class,
                'crmAddressType'            => \Syscover\Crm\GraphQL\Queries\AddressTypeQuery::class,

                // ADDRESS
                'crmAddressesPagination'    => \Syscover\Crm\GraphQL\Queries\AddressesPaginationQuery::class,
                'crmAddresses'              => \Syscover\Crm\GraphQL\Queries\AddressesQuery::class,
                'crmAddress'                => \Syscover\Crm\GraphQL\Queries\AddressQuery::class,
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

                // ADDRESS TYPE
                'crmAddAddressType'       => \Syscover\Crm\GraphQL\Mutations\AddAddressTypeMutation::class,
                'crmUpdateAddressType'      => \Syscover\Crm\GraphQL\Mutations\UpdateAddressTypeMutation::class,
                'crmDeleteAddressType'      => \Syscover\Crm\GraphQL\Mutations\DeleteAddressTypeMutation::class,

                // ADDRESS
                'crmAddAddress'             => \Syscover\Crm\GraphQL\Mutations\AddAddressMutation::class,
                'crmUpdateAddress'          => \Syscover\Crm\GraphQL\Mutations\UpdateAddressMutation::class,
                'crmDeleteAddress'          => \Syscover\Crm\GraphQL\Mutations\DeleteAddressMutation::class,
            ]
        ]));
    }
}