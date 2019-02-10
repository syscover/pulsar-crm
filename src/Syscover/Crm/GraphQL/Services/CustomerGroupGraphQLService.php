<?php namespace Syscover\Crm\GraphQL\Services;

use Syscover\Crm\Models\CustomerGroup;
use Syscover\Crm\Services\CustomerGroupService;
use Syscover\Core\GraphQL\Services\CoreGraphQLService;

class CustomerGroupGraphQLService extends CoreGraphQLService
{
    protected $model = CustomerGroup::class;
    protected $serviceClassName = CustomerGroupService::class;
}
