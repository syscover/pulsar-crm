<?php namespace Syscover\Crm\GraphQL\Inputs;

use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Type as GraphQLType;

class CustomerInput extends GraphQLType
{
    protected $attributes = [
        'name' => 'CustomerInput',
        'description' => 'CustomerInput'
    ];

    protected $inputObject = true;

    public function fields()
    {
        return [
            'id' => [
                'type' => Type::int(),
                'description' => 'The id of customer'
            ],
            'lang_id' => [
                'type' => Type::string(),
                'description' => 'Language of customer'
            ],
            'group_id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'Group that belong this customer'
            ],
            'date' => [
                'type' => Type::string(),
                'description' => 'Registration date'
            ],
            'company' => [
                'type' => Type::string(),
                'description' => 'Company of customer'
            ],
            'tin' => [
                'type' => Type::string(),
                'description' => 'TIN/CIF/NIF of customer'
            ],
            'gender_id' => [
                'type' => Type::int(),
                'description' => 'Customer gender'
            ],
            'treatment_id' => [
                'type' => Type::int(),
                'description' => 'Customer treatment, Mr...'
            ],
            'state_id' => [
                'type' => Type::int(),
                'description' => 'Customer state, Single...'
            ],
            'name' => [
                'type' => Type::string(),
                'description' => 'Name of customer'
            ],
            'surname' => [
                'type' => Type::string(),
                'description' => 'Name of customer'
            ],
            'avatar' => [
                'type' => Type::string(),
                'description' => 'Avatar customer'
            ],
            'birth_date' => [
                'type' => Type::string(),
                'description' => 'Birth date of customer'
            ],
            'email' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'The email of customer'
            ],
            'phone' => [
                'type' => Type::string(),
                'description' => 'The phone of customer'
            ],
            'mobile' => [
                'type' => Type::string(),
                'description' => 'The mobile of customer'
            ],

            // access
            'user' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'Username of user'
            ],
            'password' => [
                'type' => Type::string(),
                'description' => 'Password of user'
            ],
            'active' => [
                'type' => Type::nonNull(Type::boolean()),
                'description' => 'check if customer is active'
            ],
            'confirmed' => [
                'type' => Type::boolean(),
                'description' => 'check if customer is confirmed'
            ],

            // geolocation data
            'country_id' => [
                'type' => Type::string(),
                'description' => 'The country id of customer'
            ],
            'territorial_area_1_id' => [
                'type' => Type::string(),
                'description' => 'The territorial area 1 id of customer'
            ],
            'territorial_area_2_id' => [
                'type' => Type::string(),
                'description' => 'The territorial area 2 id of customer'
            ],
            'territorial_area_3_id' => [
                'type' => Type::string(),
                'description' => 'The territorial area 3 id of customer'
            ],
            'zip' => [
                'type' => Type::string(),
                'description' => 'The ZIP of customer'
            ],
            'locality' => [
                'type' => Type::string(),
                'description' => 'Locality of customer'
            ],
            'address' => [
                'type' => Type::string(),
                'description' => 'Address of customer'
            ],
            'latitude' => [
                'type' => Type::string(),
                'description' => 'Latitude of customer'
            ],
            'longitude' => [
                'type' => Type::string(),
                'description' => 'Longitude of customer'
            ],

            // customs fields
            'field_group_id' => [
                'type' => Type::int(),
                'description' => 'Field group for add custom fields'
            ],

            // data
            'data' => [
                'type' => Type::string(),
                'description' => 'Data customer'
            ]
        ];
    }
}