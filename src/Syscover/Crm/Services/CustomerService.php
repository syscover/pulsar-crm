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
        if(empty($object['email']))
            throw new \Exception('You have to define an email field to record a user');

        $object = collect($object);

        return Customer::create([
            'lang_id'               => $object->get('lang_id'),
            'group_id'              => $object->get('group_id'),
            'date'                  => $object->has('date')? (new Carbon($object->get('date'), config('app.timezone')))->toDateTimeString() : Carbon::now(config('app.timezone'))->toDateTimeString(),
            'company'               => $object->get('company'),
            'tin'                   => $object->get('tin'),
            'gender_id'             => $object->get('gender'),
            'treatment_id'          => $object->get('treatment_id'),
            'state_id'              => $object->get('state_id'),
            'name'                  => $object->get('name'),
            'surname'               => $object->get('surname'),
            'avatar'                => $object->get('avatar'),
            'birth_date'            => $object->has('birthDate')? (new Carbon($object->get('date'), config('app.timezone')))->toDateString() : null,
            'email'                 => strtolower($object['email']),
            'phone'                 => $object->get('phone'),
            'mobile'                => $object->get('mobile'),
            'user'                  => $object->has('user')? $object->get('user') : strtolower($object->get('email')),
            'password'              => $object->has('password')? Hash::make($object->get('password')) : Hash::make(Miscellaneous::randomStr(8)),
            'active'                => $object->has('active'),
            'country_id'            => $object->get('country'),
            'territorial_area_1_id' => $object->get('territorial_area_1_id'),
            'territorial_area_2_id' => $object->get('territorial_area_2_id'),
            'territorial_area_3_id' => $object->get('territorial_area_3_id'),
            'cp'                    => $object->get('cp'),
            'locality'              => $object->get('locality'),
            'address'               => $object->get('address'),
            'latitude'              => $object->get('latitude'),
            'longitude'             => $object->get('longitude')
        ]);
    }

    /**
     * Function to update a customer
     * @param   array     $object
     * @param   int       $id         old id of section
     * @return  \Syscover\Crm\Models\Customer
     * @throws  \Exception
     */
    public static function update($object, $id)
    {
        if(empty($object['id']))
            throw new \Exception('You have to indicate a id customer');

        if(empty($object['email']))
            throw new \Exception('You have to define an email field to record a user');

        $object = collect($object);

        Customer::where('id', $id)
            ->update([
                'lang_id'               => $object->get('lang_id'),
                'group_id'              => $object->get('group_id'),
                'company'               => $object->get('company'),
                'tin'                   => $object->get('tin'),
                'gender_id'             => $object->get('gender'),
                'treatment_id'          => $object->get('treatment_id'),
                'state_id'              => $object->get('state_id'),
                'name'                  => $object->get('name'),
                'surname'               => $object->get('surname'),
                'avatar'                => $object->get('avatar'),
                'birth_date'            => $object->has('birthDate')? (new Carbon($object->get('date'), config('app.timezone')))->toDateString() : null,
                'email'                 => strtolower($object->get('email')),
                'phone'                 => $object->get('phone'),
                'mobile'                => $object->get('mobile'),
                'user'                  => $object->has('user')? $object->get('user') : strtolower($object->get('email')),
                'active'                => $object->has('active'),
                'country_id'            => $object->get('country'),
                'territorial_area_1_id' => $object->get('territorial_area_1_id'),
                'territorial_area_2_id' => $object->get('territorial_area_2_id'),
                'territorial_area_3_id' => $object->get('territorial_area_3_id'),
                'cp'                    => $object->get('cp'),
                'locality'              => $object->get('locality'),
                'address'               => $object->get('address'),
                'latitude'              => $object->get('latitude'),
                'longitude'             => $object->get('longitude')
            ]);

        $customer = Customer::builder()->find($object->get('id'));

        if($customer === null)
            throw new \Exception('You have to indicate an id of a existing customer');

        return $customer;
    }

    /**
     * Function updatePassword
     * @param   \Illuminate\Http\Request        $object
     * @return  \Syscover\Crm\Models\Customer   $customer
     * @throws  \Exception
     */
    public static function updatePassword(Request $object)
    {
        if(empty($object['id']))
            throw new \Exception('You have to indicate a id customer');

        if(empty($object['password']))
            throw new \Exception('You have to indicate a password');

        // pass object to collection
        $object = collect($object);

        $customer = Customer::builder()->find($object->get('id'));

        if($customer === null)
            throw new \Exception('You have to indicate an id of a existing customer');

        Customer::where('id', $object->get('id'))
            ->update([
                'password' => Hash::make($object->get('password')),
            ]);
    }
}