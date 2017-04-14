<?php namespace Syscover\Crm\Models;

use Syscover\Core\Models\CoreModel;
use Illuminate\Support\Facades\Validator;

/**
 * Class Group
 * @package Syscover\Crm\Models
 */

class Group extends CoreModel
{
	protected $table        = 'group';
    protected $fillable     = ['name'];
    public $timestamps      = false;
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
