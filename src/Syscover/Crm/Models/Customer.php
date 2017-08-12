<?php namespace Syscover\Crm\Models;

use Syscover\Admin\Models\Attachment;
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
//use Syscover\Crm\Notifications\ResetPassword as ResetPasswordNotification;

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
    public $timestamps      = false;
    protected $fillable     = ['id', 'lang_id', 'group_id', 'date', 'company', 'tin', 'gender_id', 'treatment_id', 'state_id', 'name', 'surname', 'avatar', 'birth_date', 'email', 'phone', 'mobile', 'user', 'password', 'active', 'confirmed', 'country_id', 'territorial_area_1_id', 'territorial_area_2_id', 'territorial_area_3_id', 'cp', 'locality', 'address', 'latitude', 'longitude', 'field_group_id', 'data'];
    protected $hidden       = ['password', 'remember_token'];
    private static $rules   = [
        'name'      => 'required|between:2,255',
        'email'     => 'required|between:2,255|email|unique:customer,email',
        'user'      => 'required|between:2,255|unique:customer,user',
        'password'  => 'required|between:4,50|same:repassword'
    ];

    // custom properties
    public $class_tax = null;

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
            ->leftJoin('crm_group', 'crm_customer.group_id', '=', 'crm_group.id');
    }

    /**
     * Get group from user
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function group()
    {
        return $this->belongsTo(Group::class, 'group_id');
    }

    /**
     * Get attachments from customer
     *
     * @return mixed
     */
    public function attachments()
    {
        return $this->hasMany(Attachment::class, 'object_id')
            ->where('admin_attachment.lang_id', base_lang())
            ->where('admin_attachment.resource_id', 'crm-customer')
            ->leftJoin('admin_attachment_family', 'admin_attachment.family_id', '=', 'admin_attachment_family.id')
            ->orderBy('admin_attachment.sorting');
    }
}