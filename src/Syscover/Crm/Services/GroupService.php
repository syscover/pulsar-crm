<?php namespace Syscover\Crm\Services;

use Syscover\Crm\Models\Group;

class GroupService
{
    public static function create($object)
    {
        GroupService::check($object);
        return Group::create(GroupService::builder($object));
    }

    public static function update($object, $id)
    {
        GroupService::check($object);
        Group::where('id', $id)->update(GroupService::builder($object));

        return Group::builder()->find($id);
    }

    private static function builder($object)
    {
        $object = collect($object);
        $data = [];

        if($object->has('name')) $data['name'] = $object->get('name');

        return $data;
    }

    private static function check($object)
    {
        if(empty($object['name'])) throw new \Exception('You have to define a name field to create a group');
    }
}