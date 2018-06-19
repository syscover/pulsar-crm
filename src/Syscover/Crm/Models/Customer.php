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
use Syscover\Crm\Events\ResetLinkEmailSent;

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
    protected $fillable     = ['id', 'lang_id', 'group_id', 'date', 'company', 'tin', 'gender_id', 'treatment_id', 'state_id', 'name', 'surname', 'avatar', 'birth_date', 'email', 'phone', 'mobile', 'user', 'password', 'active', 'confirmed', 'country_id', 'territorial_area_1_id', 'territorial_area_2_id', 'territorial_area_3_id', 'zip', 'locality', 'address', 'latitude', 'longitude', 'field_group_id', 'data'];
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
            ->leftJoin('crm_customer_group', 'crm_customer.group_id', '=', 'crm_customer_group.id')
            ->select('admin_lang.*', 'crm_customer_group.*', 'crm_customer.*', 'admin_lang.name as lang_name', 'crm_customer_group.name as group_name', 'crm_customer.name as customer_name');
    }

    public function group()
    {
        return $this->belongsTo(CustomerGroup::class, 'group_id');
    }

    public function addresses()
    {
        return $this->hasMany(Address::class, 'customer_id');
    }

    public function orders()
    {
        // don't use object because it can be used in crm module without market module
        return $this->hasMany('Syscover\Market\Models\Order', 'customer_id');
    }

    /**
     * Create array object with values to create a order
     *
     * @return array
     */
    public function getDataOrder()
    {
        $data                       = [];
        $data['customer_id']        = $this->id;
        $data['customer_group_id']  = $this->group_id;
        $data['customer_company']   = $this->company;
        $data['customer_tin']       = $this->tin;
        $data['customer_name']      = $this->name;
        $data['customer_surname']   = $this->surname;
        $data['customer_email']     = $this->email;
        $data['customer_mobile']    = $this->mobile;
        $data['customer_phone']     = $this->phone;

        return $data;
    }

    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        // Fire event to change comment from public web
        $res = event(new ResetLinkEmailSent($this, $token));

        dd($res);

        $this->notify(new ResetPasswordNotification($token));
    }
}