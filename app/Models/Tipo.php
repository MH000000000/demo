<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Tipo
 *
 * @property $id
 * @property $tokenable_type
 * @property $tokenable_id
 * @property $name
 * @property $token
 * @property $abilities
 * @property $last_used_at
 * @property $created_at
 * @property $updated_at
 *
 * @property Empleado[] $empleados
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Tipo extends Model
{
    
    static $rules = [
		'tokenable_type' => 'required',
		'tokenable_id' => 'required',
		'name' => 'required',
		'token' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['tokenable_type','tokenable_id','name','token','abilities','last_used_at'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */

    

}
