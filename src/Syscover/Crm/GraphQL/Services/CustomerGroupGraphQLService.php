<?php namespace Syscover\Crm\GraphQL\Services;

use Syscover\Crm\Models\CustomerGroup;
use Syscover\Crm\Services\CustomerGroupService;
use Syscover\Core\GraphQL\Services\CoreGraphQLService;

class CustomerGroupGraphQLService extends CoreGraphQLService
{
    public function __construct(CustomerGroup $model, CustomerGroupService $service)
    {
        $this->model = $model;
        $this->service = $service;
    }
}
