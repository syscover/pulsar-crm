<?php namespace Syscover\Crm\GraphQL\Services;

use Syscover\Crm\Models\Address;
use Syscover\Crm\Services\AddressService;
use Syscover\Core\GraphQL\Services\CoreGraphQLService;

class AddressGraphQLService extends CoreGraphQLService
{
    public function __construct(Address $model, AddressService $service)
    {
        $this->model = $model;
        $this->service = $service;
    }
}
