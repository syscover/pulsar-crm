<?php namespace Syscover\Crm\GraphQL\Services;

use Syscover\Crm\Models\Customer;
use Syscover\Crm\Services\CustomerService;
use Syscover\Core\GraphQL\Services\CoreGraphQLService;

class CustomerGraphQLService extends CoreGraphQLService
{
    protected $modelClassName = Customer::class;
    protected $serviceClassName = CustomerService::class;
}