<?php namespace Syscover\Crm\Services;

use Illuminate\Support\Facades\Hash;
use Syscover\Crm\Models\Customer;

class CustomerService
{
    public static function create($object)
    {
        self::checkCreate($object);
        return Customer::create(self::builder($object));
    }

    public static function update($object)
    {
        self::checkUpdate($object);
        Customer::where('id', $object['id'])->update(self::builder($object));

        return  Customer::builder()->find($object['id']);
    }

    private static function builder($object, $filterKeys = null)
    {
        $object = collect($object);

        if($filterKeys)
        {
            $object = $object->only($filterKeys);
        }
        else
        {
            $object = $object->only([
                'lang_id',
                'group_id',
                'date',
                'company',
                'tin',
                'gender_id',
                'treatment_id',
                'state_id',
                'name',
                'surname',
                'avatar',
                'birth_date',
                'email',
                'phone',
                'mobile',
                'user',
                'password',
                'active',
                'confirmed',
                'country_id',
                'territorial_area_1_id',
                'territorial_area_2_id',
                'territorial_area_3_id',
                'zip',
                'locality',
                'address',
                'latitude',
                'longitude',
                'field_group_id',
                'data'
            ]);
        }


        if($object->get('password'))
        {
            $object['password'] = Hash::make($object->get('password'));
        }
        else
        {
            $object = $object->forget('password');
        }
        if($object->get('email'))       $data['email'] = strtolower($object->get('email'));
        if($object->get('date'))        $object['date'] = date_time_string($object->get('date'));
        if($object->get('birth_date'))  $object['birth_date'] = date_time_string($object->get('birth_date'));

        return $object->toArray();
    }

    private static function checkCreate($object)
    {
        if(empty($object['email']))     throw new \Exception('You have to define a email field to create a customer');
        if(empty($object['user']))      throw new \Exception('You have to define a user field to create a customer');
        if(empty($object['password']))  throw new \Exception('You have to define a password field to create a customer');
    }

    private static function checkUpdate($object)
    {
        if(empty($object['id']))      throw new \Exception('You have to define a id field to update a customer');
    }
}