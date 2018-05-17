<?php namespace Syscover\Crm\GraphQL\Types;

use GraphQL;
use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Type as GraphQLType;

class AddressType extends GraphQLType
{
    protected $attributes = [
        'name' => 'Address',
        'description' => 'Address'
    ];

    public function fields()
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'The id of address'
            ],
            'type_id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'Type of address'
            ],
            'type' => [
                'type' => Type::nonNull(GraphQL::type('CrmAddressType')),
                'description' => 'Type that belong this address'
            ],
            'customer_id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'Customer related with this address'
            ],
            'alias' => [
                'type' => Type::string(),
                'description' => 'Alias of address'
            ],
            'lang_id' => [
                'type' => Type::string(),
                'description' => 'Language of address'
            ],
            'company' => [
                'type' => Type::string(),
                'description' => 'Company of address'
            ],
            'tin' => [
                'type' => Type::string(),
                'description' => 'TIN/CIF/NIF of address'
            ],
            'name' => [
                'type' => Type::string(),
                'description' => 'Name of address'
            ],
            'surname' => [
                'type' => Type::string(),
                'description' => 'Name of address'
            ],
            'email' => [
                'type' => Type::string(),
                'description' => 'The email of address'
            ],
            'phone' => [
                'type' => Type::string(),
                'description' => 'The phone of address'
            ],
            'mobile' => [
                'type' => Type::string(),
                'description' => 'The mobile of address'
            ],

            // geolocation data
            'country_id' => [
                'type' => Type::string(),
                'description' => 'The country id of address'
            ],
            'territorial_area_1_id' => [
                'type' => Type::string(),
                'description' => 'The territorial area 1 id of address'
            ],
            'territorial_area_2_id' => [
                'type' => Type::string(),
                'description' => 'The territorial area 2 id of address'
            ],
            'territorial_area_3_id' => [
                'type' => Type::string(),
                'description' => 'The territorial area 3 id of address'
            ],
            'zip' => [
                'type' => Type::string(),
                'description' => 'The ZIP of address'
            ],
            'locality' => [
                'type' => Type::string(),
                'description' => 'Locality of address'
            ],
            'address' => [
                'type' => Type::string(),
                'description' => 'Address of address'
            ],
            'latitude' => [
                'type' => Type::string(),
                'description' => 'Latitude of address'
            ],
            'longitude' => [
                'type' => Type::string(),
                'description' => 'Longitude of address'
            ],

            // data
            'data' => [
                'type' => Type::string(),
                'description' => 'Data address'
            ]
        ];
    }
}