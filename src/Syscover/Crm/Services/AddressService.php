<?php namespace Syscover\Crm\Services;

use Syscover\Crm\Models\Address;

class AddressService
{
    /**
     * Function to create a address
     * @param   array                           $object
     * @return  \Syscover\Crm\Models\Customer
     * @throws  \Exception
     */
    public static function create($object)
    {
        if(isset($object['email']))
            $object['email'] = strtolower($object['email']);

        if(isset($object['favorite']))
            Address::where('type_id', $object['type_id'])
                ->update(['favorite' => false]);

        return Address::create($object);
    }

    /**
     * Function to create a address
     * @param   array $objects
     * @return  boolean
     */
    public static function insert($objects)
    {
        $formated = [];
        foreach($objects as $object)
        {
            $object     = collect($object);

            $formated[] = [
                'type_id'               => $object->get('type_id'),
                'customer_id'           => $object->get('customer_id'),
                'alias'                 => $object->get('alias'),
                'lang_id'               => $object->get('lang_id'),
                'company'               => $object->get('company'),
                'tin'                   => $object->get('tin'),
                'name'                  => $object->get('name'),
                'surname'               => $object->get('surname'),
                'email'                 => $object->get('email')?: strtolower($object->get('email')),
                'phone'                 => $object->get('phone'),
                'mobile'                => $object->get('mobile'),
                'country_id'            => $object->get('country_id'),
                'territorial_area_1_id' => $object->get('territorial_area_1_id'),
                'territorial_area_2_id' => $object->get('territorial_area_2_id'),
                'territorial_area_3_id' => $object->get('territorial_area_3_id'),
                'cp'                    => $object->get('cp'),
                'locality'              => $object->get('locality'),
                'address'               => $object->get('address'),
                'latitude'              => $object->get('latitude'),
                'longitude'             => $object->get('longitude'),
                'favorite'              => $object->has('favorite'),
            ];
        }

        return Address::insert($formated);
    }

    /**
     * Function to update a address
     * @param   array     $object
     * @param   int       $id         old id of address
     * @return  \Syscover\Crm\Models\Customer
     * @throws  \Exception
     */
    public static function update($object, $id)
    {
        if(empty($object['id']))
            throw new \Exception('You have to indicate a id address');

        if(isset($object['email']))
            $object['email'] = strtolower($object['email']);

        $object = collect($object);

        if($object->has('favorite'))
            Address::where('type_id', $object->get('type_id'))
                ->update(['favorite' => false]);

        Address::where('id', $id)
            ->update([
                'type_id'               => $object->get('type_id'),
                'customer_id'           => $object->get('customer_id'),
                'alias'                 => $object->get('alias'),
                'lang_id'               => $object->get('lang_id'),
                'company'               => $object->get('company'),
                'tin'                   => $object->get('tin'),
                'name'                  => $object->get('name'),
                'surname'               => $object->get('surname'),
                'email'                 => $object->get('email'),
                'phone'                 => $object->get('phone'),
                'mobile'                => $object->get('mobile'),
                'country_id'            => $object->get('country_id'),
                'territorial_area_1_id' => $object->get('territorial_area_1_id'),
                'territorial_area_2_id' => $object->get('territorial_area_2_id'),
                'territorial_area_3_id' => $object->get('territorial_area_3_id'),
                'cp'                    => $object->get('cp'),
                'locality'              => $object->get('locality'),
                'address'               => $object->get('address'),
                'latitude'              => $object->get('latitude'),
                'longitude'             => $object->get('longitude'),
                'favorite'              => $object->has('favorite'),
            ]);

        return Address::builder()->find($id);
    }
}