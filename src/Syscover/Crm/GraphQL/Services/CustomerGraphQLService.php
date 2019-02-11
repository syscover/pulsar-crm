<?php namespace Syscover\Crm\GraphQL\Services;

use Syscover\Crm\Models\Customer;
use Syscover\Crm\Services\CustomerService;
use Syscover\Core\GraphQL\Services\CoreGraphQLService;

class CustomerGraphQLService extends CoreGraphQLService
{
    public function __construct(Customer $model, CustomerService $service)
    {
        $this->model = $model;
        $this->service = $service;
    }
}
