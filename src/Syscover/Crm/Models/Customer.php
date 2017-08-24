<?php namespace Syscover\Crm\Models;

use Syscover\Admin\Traits\Translatable;
use Syscover\Core\Models\CoreModel;
use Illuminate\Support\Facades\Validator;
use Illuminate\Notifications\Notifiable;
use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use App\Http\Notifications\ResetPassword as ResetPasswordNotification;

/**
 * Class Customer
 * @package Syscover\Crm\Models
 */

class Customer extends CoreModel implements
    AuthenticatableContract,
    AuthorizableContract,
    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;
    use Notifiable;
    use Translatable;

	protected $table        = 'crm_customer';
    protected $fillable     = ['id', 'lang_id', 'group_id', 'date', 'company', 'tin', 'gender_id', 'treatment_id', 'state_id', 'name', 'surname', 'avatar', 'birth_date', 'email', 'phone', 'mobile', 'user', 'password', 'active', 'confirmed', 'country_id', 'territorial_area_1_id', 'territorial_area_2_id', 'territorial_area_3_id', 'cp', 'locality', 'address', 'latitude', 'longitude', 'field_group_id', 'data'];
    protected $hidden       = ['password', 'remember_token'];
    protected $casts        = [
        'active'    => 'boolean',
        'data'      => 'array'
    ];
    public $with            = [
        'group',
        'addresses'
    ];

    public $class_tax = null; // custom properties

    private static $rules   = [
        'name'      => 'required|between:2,255',
        'email'     => 'required|between:2,255|email|unique:customer,email',
        'user'      => 'required|between:2,255|unique:customer,user',
        'password'  => 'required|between:4,50|same:repassword'
    ];

    public static function validate($data, $specialRules)
    {
        if(isset($specialRules['emailRule']) && $specialRules['emailRule']) static::$rules['email']     = 'required|between:2,255|email';
        if(isset($specialRules['userRule']) && $specialRules['userRule'])   static::$rules['user']      = 'required|between:2,255';
        if(isset($specialRules['passRule']) && $specialRules['passRule'])   static::$rules['password']  = '';

        return Validator::make($data, static::$rules);
	}

    public function scopeBuilder($query)
    {
        return $query->leftJoin('admin_lang', 'crm_customer.lang_id', '=', 'admin_lang.id')
            ->leftJoin('crm_group', 'crm_customer.group_id', '=', 'crm_group.id')
            ->select('admin_lang.*', 'crm_group.*', 'crm_customer.*', 'admin_lang.name as lang_name', 'crm_group.name as group_name', 'crm_customer.name as customer_name');
    }

    public function group()
    {
        return $this->belongsTo(Group::class, 'group_id');
    }

    public function addresses()
    {
        return $this->hasMany(Address::class, 'customer_id');
    }

    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPasswordNotification($token));
    }
}