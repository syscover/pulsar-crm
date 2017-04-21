<?php namespace Syscover\Crm\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Syscover\Crm\Models\Customer;

class CustomerService
{
    /**
     * Function to create a customer
     * @param   \Illuminate\Http\Request        $request
     * @return  \Syscover\Crm\Models\Customer   $customer
     * @throws  \Exception
     */
    public static function createCustomer(Request $request)
    {
        if(! $request->has('email'))
            throw new \Exception('You have to define an email field to record a user');

        $customer = Customer::create([
            'lang_id'               => $request->input('lang_id'),
            'group_id'              => $request->input('group_id'),
            'date'                  => $request->has('date')? \DateTime::createFromFormat(config('pulsar.core.datePattern'), $request->input('date'))->getTimestamp() : date('U'),
            'company'               => $request->input('company'),
            'tin'                   => $request->input('tin'),
            'gender_id'             => $request->input('gender'),
            'treatment_id'          => $request->input('treatment_id'),
            'state_id'              => $request->input('state_id'),
            'name'                  => $request->input('name'),
            'surname'               => $request->input('surname'),
            'avatar'                => $request->input('avatar'),
            'birth_date'            => $request->has('birthDate')? \DateTime::createFromFormat(config('pulsar.core.datePattern'), $request->input('birthDate'))->getTimestamp() : null,
            'email'                 => strtolower($request->input('email')),
            'phone'                 => $request->input('phone'),
            'mobile'                => $request->input('mobile'),
            'user'                  => $request->has('user')? $request->input('user') : strtolower($request->input('email')),
            'password'              => $request->has('password')? Hash::make($request->input('password')) : Hash::make(Miscellaneous::randomStr(8)),
            'active'                => $request->has('active'),
            'confirmed'             => false,
            'country_id'            => $request->input('country'),
            'territorial_area_1_id' => $request->input('territorial_area_1_id'),
            'territorial_area_2_id' => $request->input('territorial_area_2_id'),
            'territorial_area_3_id' => $request->input('territorial_area_3_id'),
            'cp'                    => $request->input('cp'),
            'locality'              => $request->input('locality'),
            'address'               => $request->input('address'),
            'latitude'              => $request->input('latitude'),
            'longitude'             => $request->input('longitude')
        ]);

        return $customer;
    }
}