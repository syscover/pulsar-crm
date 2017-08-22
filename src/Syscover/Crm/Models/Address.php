<?php namespace Syscover\Crm\Models;

use Syscover\Core\Models\CoreModel;
use Illuminate\Support\Facades\Validator;

/**
 * Class Address
 * @package Syscover\Crm\Models
 */

class Address extends CoreModel
{
	protected $table        = 'crm_address';
    protected $fillable     = ['id', 'type_id', 'customer_id', 'alias', 'lang_id', 'company', 'tin', 'name', 'surname', 'email', 'phone', 'mobile', 'country_id', 'territorial_area_1_id', 'territorial_area_2_id', 'territorial_area_3_id', 'cp', 'locality', 'address', 'latitude', 'longitude', 'data'];
    protected $casts        = [
        'data'      => 'array'
    ];
    private static $rules   = [
        'type_id'  => 'required',
        'customer_id'  => 'required'
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
