<?php namespace Syscover\Crm\Services;

use Syscover\Crm\Models\Type;

class TypeService
{
    /**
     * Function to create a group
     * @param   array                           $object
     * @return  \Syscover\Crm\Models\Group
     * @throws  \Exception
     */
    public static function create($object)
    {
        return Type::create(TypeService::builder($object));
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
        Type::where('id', $id)->update(TypeService::builder($object));

        return Type::builder()->find($id);
    }

    private static function builder($object)
    {
        $object = collect($object);
        $data = [];

        if($object->has('name'))    $data['name'] = $object->get('name');

        return $data;
    }
}