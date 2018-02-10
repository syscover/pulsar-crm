<?php namespace Syscover\Crm\Services;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Syscover\Crm\Models\Customer;

class CustomerService
{
    /**
     * Function to create a customer
     * @param   array                           $object
     * @return  \Syscover\Crm\Models\Customer
     * @throws  \Exception
     */
    public static function create($object)
    {
        if(empty($object['email']))     throw new \Exception('You have to define a email field to create a user');
        if(empty($object['user']))      throw new \Exception('You have to define a user field to create a user');
        if(empty($object['password']))  throw new \Exception('You have to define a password field to create a user');

        return Customer::create(CustomerService::builder($object));
    }

    /**
     * Function to update a customer
     * @param   array     $object
     * @param   int       $id         old id of customer
     * @return  \Syscover\Crm\Models\Customer
     * @throws  \Exception
     */
    public static function update($object, $id)
    {
        Customer::where('id', $id)->update(CustomerService::builder($object));
        $customer = Customer::builder()->find($id);

        if($customer === null) throw new \Exception('You have to indicate an id of a existing customer');

        return $customer;
    }

    private static function builder($object)
    {
        $object = collect($object);
        $data = [];

        if($object->has('lang_id'))                 $data['lang_id'] = $object->get('lang_id');
        if($object->has('group_id'))                $data['group_id'] = $object->get('group_id');
        if($object->has('date'))                    $data['date'] = (new Carbon($object->get('date'), config('app.timezone')))->toDateTimeString();
        if($object->has('company'))                 $data['company'] = $object->get('company');
        if($object->has('tin'))                     $data['tin'] = $object->get('tin');
        if($object->has('gender'))                  $data['gender'] = $object->get('gender');
        if($object->has('treatment_id'))            $data['treatment_id'] = $object->get('treatment_id');
        if($object->has('state_id'))                $data['state_id'] = $object->get('state_id');
        if($object->has('name'))                    $data['name'] = $object->get('name');
        if($object->has('surname'))                 $data['surname'] = $object->get('surname');
        if($object->has('avatar'))                  $data['avatar'] = $object->get('avatar');
        if($object->has('birthDate'))               $data['birthDate'] = (new Carbon($object->get('birthDate'), config('app.timezone')))->toDateString();
        if($object->has('email'))                   $data['email'] = strtolower($object->get('email'));
        if($object->has('phone'))                   $data['phone'] = $object->get('phone');
        if($object->has('mobile'))                  $data['mobile'] = $object->get('mobile');
        if($object->has('user'))                    $data['user'] = $object->get('user');
        if($object->has('password'))                $data['password'] = Hash::make($object->get('password'));
        if($object->has('active'))                  $data['active'] = $object->get('active');
        if($object->has('country_id'))              $data['country_id'] = $object->get('country_id');
        if($object->has('territorial_area_1_id'))   $data['territorial_area_1_id'] = $object->get('territorial_area_1_id');
        if($object->has('territorial_area_2_id'))   $data['territorial_area_2_id'] = $object->get('territorial_area_2_id');
        if($object->has('territorial_area_3_id'))   $data['territorial_area_3_id'] = $object->get('territorial_area_3_id');
        if($object->has('zip'))                     $data['zip'] = $object->get('zip');
        if($object->has('locality'))                $data['locality'] = $object->get('locality');
        if($object->has('address'))                 $data['address'] = $object->get('address');
        if($object->has('latitude'))                $data['latitude'] = $object->get('latitude');
        if($object->has('longitude'))               $data['longitude'] = $object->get('longitude');

        return $data;
    }
}