<?php namespace Syscover\Crm\Models;

use Syscover\Core\Models\CoreModel;
use Illuminate\Support\Facades\Validator;

/**
 * Class Type
 * @package Syscover\Crm\Models
 */

class Type extends CoreModel
{
	protected $table        = 'crm_type';
    protected $fillable     = ['name'];
    private static $rules   = [
        'name'  => 'required|between:2,255'
    ];
        
    public static function validate($data, $specialRules = [])
    {
        return Validator::make($data, static::$rules);
	}

    public function scopeBuilder($query)
    {
        return $query;
    }
}
