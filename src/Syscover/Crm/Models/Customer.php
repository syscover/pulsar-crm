<?php namespace Syscover\Crm\Models;

use Syscover\Core\Models\CoreModel;
use Syscover\Admin\Models\Lang;
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

class Customer extends CoreModel implements AuthenticatableContract, AuthorizableContract, CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;
    use Notifiable;

	protected $table        = 'customer';
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
        return $query->leftJoin('lang', 'customer.lang_id', '=', 'lang.id')
            ->leftJoin('group', 'customer.group_id', '=', 'group.id');
    }

    /**
     * Get Lang from user
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function lang()
    {
        return $this->belongsTo(Lang::class, 'lang_id');
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
        return $this->hasMany('Syscover\Pulsar\Models\Attachment', 'object_id_016')
            ->where('001_016_attachment.lang_id_016', base_lang()->id_001)
            ->where('001_016_attachment.resource_id_016', 'crm-customer')
            ->leftJoin('001_015_attachment_family', '001_016_attachment.family_id_016', '=', '001_015_attachment_family.id_015')
            ->orderBy('001_016_attachment.sorting_016');
    }

    /**
     * Get the unique identifier for the user.
     *
     * @return mixed
     */
    public function getAuthIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Get the password for the user.
     *
     * @return string
     */
    public function getAuthPassword()
    {
        return $this->password;
    }

    /**
     * Get the token value for the "remember me" session.
     *
     * @return string
     */
    public function getRememberToken()
    {
        return $this->{$this->getRememberTokenName()};
    }

    /**
     * Set the token value for the "remember me" session.
     *
     * @param  string  $value
     * @return void
     */
    public function setRememberToken($value)
    {
        $this->{$this->getRememberTokenName()} = $value;
    }

    /**
     * Get the column name for the "remember me" token.
     *
     * @return string
     */
    public function getRememberTokenName()
    {
        return 'remember_token';
    }

    /**
     * Get the e-mail address where password reset links are sent.
     *
     * @return string
     */
    public function getEmailForPasswordReset()
    {
        return $this->email;
    }

    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        //$this->notify(new ResetPasswordNotification($token));
    }

    /**
     * Get the name of the unique identifier for the user.
     *
     * @return string
     */
    public function getAuthIdentifierName()
    {
        return $this->user;
    }
}