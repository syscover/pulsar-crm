<?php namespace Syscover\Crm\Services;

use Syscover\Crm\Models\Group;

class GroupService
{
    public static function create($object)
    {
        GroupService::checkCreate($object);
        return Group::create(GroupService::builder($object));
    }

    public static function update($object)
    {
        GroupService::checkUpdate($object);
        Group::where('id', $object['id'])->update(GroupService::builder($object));

        return Group::builder()->find($object['id']);
    }

    private static function builder($object)
    {
        $object = collect($object);
        return $object->only('name')->toArray();
    }

    private static function checkCreate($object)
    {
        if(empty($object['name'])) throw new \Exception('You have to define a name field to create a group');
    }

    private static function checkUpdate($object)
    {
        if(empty($object['id']))      throw new \Exception('You have to define a id field to update a group');
    }
}