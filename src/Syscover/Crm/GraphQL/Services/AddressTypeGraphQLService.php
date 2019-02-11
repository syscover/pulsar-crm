<?php namespace Syscover\Crm\GraphQL\Services;

use Syscover\Crm\Models\AddressType;
use Syscover\Core\GraphQL\Services\CoreGraphQLService;
use Syscover\Crm\Services\AddressTypeService;

class AddressTypeGraphQLService extends CoreGraphQLService
{
    public function __construct(AddressType $model, AddressTypeService $service)
    {
        $this->model = $model;
        $this->service = $service;
    }
}
