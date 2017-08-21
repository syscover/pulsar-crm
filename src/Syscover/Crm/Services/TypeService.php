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
        return Type::create($object);
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
        $object = collect($object);

        Type::where('id', $id)
            ->update([
                'name' => $object->get('name')
            ]);

        return Type::builder()
            ->find($object->get('id'));
    }
}