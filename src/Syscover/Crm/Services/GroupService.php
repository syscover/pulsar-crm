<?php namespace Syscover\Crm\Services;

use Syscover\Crm\Models\Group;

class GroupService
{
    /**
     * Function to create a group
     * @param   array                           $object
     * @return  \Syscover\Crm\Models\Group
     * @throws  \Exception
     */
    public static function create($object)
    {
        return Group::create(GroupService::builder($object));
    }

    /**
     * Function to update a group
     * @param   array     $object
     * @param   int       $id         old id of group
     * @return  \Syscover\Crm\Models\Group
     * @throws  \Exception
     */
    public static function update($object, $id)
    {
        Group::where('id', $id)->update(GroupService::builder($object));

        return Group::builder()->find($id);
    }

    private static function builder($object)
    {
        $object = collect($object);
        $data = [];

        if($object->has('name'))    $data['name'] = $object->get('name');

        return $data;
    }
}