<?php namespace Syscover\Crm\GraphQL\Services;

use Syscover\Crm\Models\AddressType;
use Syscover\Core\GraphQL\Services\CoreGraphQLService;
use Syscover\Crm\Services\AddressTypeService;

class AddressTypeGraphQLService extends CoreGraphQLService
{
    protected $model = AddressType::class;
    protected $serviceClassName = AddressTypeService::class;
}
