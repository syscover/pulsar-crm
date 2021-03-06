<?php namespace Syscover\Crm\Models;

use Syscover\Core\Models\CoreModel;
use Illuminate\Support\Facades\Validator;

/**
 * Class CustomerGroup
 * @package Syscover\Crm\Models
 */

class CustomerGroup extends CoreModel
{
	protected $table        = 'crm_customer_group';
    protected $fillable     = ['name'];
    private static $rules   = [
        'name'  => 'required|between:2,50'
    ];
        
    public static function validate($data, $specialRules = [])
    {
        return Validator::make($data, static::$rules);
	}
}
