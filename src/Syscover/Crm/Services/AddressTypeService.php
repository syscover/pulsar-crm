<?php namespace Syscover\Crm\Services;

use Syscover\Crm\Models\AddressType;

class AddressTypeService
{
    public static function create($object)
    {
        self::checkCreate($object);
        return AddressType::create(self::builder($object));
    }

    public static function update($object)
    {
        self::checkUpdate($object);
        AddressType::where('id', $object['id'])->update(self::builder($object));

        return AddressType::builder()->find($object['id']);
    }

    private static function builder($object)
    {
        $object = collect($object);
        return $object->only(['name'])->toArray();
    }

    private static function checkCreate($object)
    {
        if(empty($object['name'])) throw new \Exception('You have to define a name field to create a address type');
    }

    private static function checkUpdate($object)
    {
        if(empty($object['id']))      throw new \Exception('You have to define a id field to update a address type');
    }
}