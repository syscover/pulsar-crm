<?php namespace Syscover\Crm\Models;

use Syscover\Core\Models\CoreModel;
use Illuminate\Support\Facades\Validator;

/**
 * Class AddressType
 * @package Syscover\Crm\Models
 */

class AddressType extends CoreModel
{
	protected $table        = 'crm_address_type';
    protected $fillable     = ['name'];
    private static $rules   = [
        'name'  => 'required|between:2,255'
    ];
        
    public static function validate($data, $specialRules = [])
    {
        return Validator::make($data, static::$rules);
	}
}
