<?php namespace Syscover\Crm\GraphQL\Services;

use Syscover\Crm\Models\Address;
use Syscover\Crm\Services\AddressService;
use Syscover\Core\GraphQL\Services\CoreGraphQLService;

class AddressGraphQLService extends CoreGraphQLService
{
    protected $model = Address::class;
    protected $service = AddressService::class;
}