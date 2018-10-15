<?php namespace Syscover\Crm\Services;

use Syscover\Crm\Models\Address;

class AddressService
{
    public static function create(array $object)
    {
        self::checkCreate($object);
        if(isset($object['favorite']) && $object['favorite'] === true) Address::where('type_id', $object['type_id'])->where('customer_id', $object['customer_id'])->update(['favorite' => false]);

        return Address::create(self::builder($object));
    }

    public static function insert(array $objects)
    {
        $addresses = [];
        foreach($objects as $object)
        {
            self::checkCreate($object);
            if(isset($object['favorite']) && $object['favorite'] === true) Address::where('type_id', $object['type_id'])->where('customer_id', $object['customer_id'])->update(['favorite' => false]);

            $addresses[] = self::builder($object);
        }

        return Address::insert($addresses);
    }

    public static function update(array $object)
    {
        self::checkUpdate($object);

        if(isset($object['favorite']) && isset($object['customer_id']) && isset($object['type_id']) && $object['favorite'] === true)
        {
            Address::where('type_id', $object['type_id'])->where('customer_id', $object['customer_id'])->update(['favorite' => false]);
        }

        Address::where('id', $object['id'])->update(self::builder($object));

        return Address::builder()->find($object['id']);
    }

    private static function builder(array $object, $filterKeys = null)
    {
        $object = collect($object);

        if($filterKeys)
        {
            $object = $object->only($filterKeys);
        }
        else
        {
            $object = $object->only([
                'type_id',
                'customer_id',
                'alias',
                'lang_id',
                'company',
                'tin',
                'name',
                'surname',
                'email',
                'phone',
                'mobile',
                'country_id',
                'territorial_area_1_id',
                'territorial_area_2_id',
                'territorial_area_3_id',
                'zip',
                'locality',
                'address',
                'latitude',
                'longitude',
                'favorite'
            ]);
        }

        return $object->toArray();
    }

    private static function checkCreate($object)
    {
        if(empty($object['type_id']))       throw new \Exception('You have to define a type_id field to create a address');
        if(empty($object['customer_id']))   throw new \Exception('You have to define a customer_id field to create a address');
    }

    private static function checkUpdate($object)
    {
        if(empty($object['id']))            throw new \Exception('You have to define a id field to update a address');
    }
}