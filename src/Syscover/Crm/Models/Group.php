<?php namespace Syscover\Crm\Models;

use Syscover\Core\Models\CoreModel;
use Illuminate\Support\Facades\Validator;

/**
 * Class Group
 * @package Syscover\Crm\Models
 */

class Group extends CoreModel
{
	protected $table        = 'crm_group';
    protected $fillable     = ['name'];
    protected $casts        = ['active' => 'boolean'];
    private static $rules   = [
        'name'  => 'required|between:2,50'
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
