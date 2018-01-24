<?php namespace Syscover\Crm\Services;

use Syscover\Crm\Models\Address;

class AddressService
{
    /**
     * Function to create a address
     *
     * @param   array $object
     * @return  \Syscover\Crm\Models\Customer
     * @throws  \Exception
     */
    public static function create($object)
    {
        if(isset($object['favorite'])) Address::where('type_id', $object['type_id'])->update(['favorite' => false]);

        return Address::create(AddressService::builder($object));
    }

    /**
     * Function to create a address
     *
     * @param   array $objects
     * @return  \Syscover\Crm\Models\Address
     */
    public static function insert($objects)
    {
        $addresses = [];
        foreach($objects as $object)
        {
            $object     = collect($object);
            $addresses[] = AddressService::builder($object);
        }

        return Address::insert($addresses);
    }

    /**
     * Function to update a address
     *
     * @param   array     $object
     * @param   int       $id         id of address
     * @return  \Syscover\Crm\Models\Address
     * @throws  \Exception
     */
    public static function update($object, $id)
    {
        if(isset($object['favorite']) && $object['favorite'] === true)
        {
            if(! isset($object['type_id'])) throw new \Exception('You must define type_id property');
            Address::where('type_id', $object['type_id'])->update(['favorite' => false]);
        }

        Address::where('id', $id)->update(AddressService::builder($object));

        return Address::builder()->find($id);
    }

    private static function builder($object)
    {
        $object = collect($object);
        $data = [];

        if($object->has('type_id'))                 $data['type_id'] = $object->get('type_id');
        if($object->has('customer_id'))             $data['customer_id'] = $object->get('customer_id');
        if($object->has('alias'))                   $data['alias'] = $object->get('alias');
        if($object->has('lang_id'))                 $data['lang_id'] = $object->get('lang_id');
        if($object->has('company'))                 $data['company'] = $object->get('company');
        if($object->has('tin'))                     $data['tin'] = $object->get('tin');
        if($object->has('name'))                    $data['name'] = $object->get('name');
        if($object->has('surname'))                 $data['surname'] = $object->get('surname');
        if($object->has('email'))                   $data['email'] = strtolower($object->get('email'));
        if($object->has('phone'))                   $data['phone'] = $object->get('phone');
        if($object->has('mobile'))                  $data['mobile'] = $object->get('mobile');
        if($object->has('country_id'))              $data['country_id'] = $object->get('country_id');
        if($object->has('territorial_area_1_id'))   $data['territorial_area_1_id'] = $object->get('territorial_area_1_id');
        if($object->has('territorial_area_2_id'))   $data['territorial_area_2_id'] = $object->get('territorial_area_2_id');
        if($object->has('territorial_area_3_id'))   $data['territorial_area_3_id'] = $object->get('territorial_area_3_id');
        if($object->has('zip'))                     $data['zip'] = $object->get('zip');
        if($object->has('locality'))                $data['locality'] = $object->get('locality');
        if($object->has('address'))                 $data['address'] = $object->get('address');
        if($object->has('latitude'))                $data['latitude'] = $object->get('latitude');
        if($object->has('longitude'))               $data['longitude'] = $object->get('longitude');
        if($object->has('favorite'))                $data['favorite'] = $object->get('favorite');

        return $data;
    }
}