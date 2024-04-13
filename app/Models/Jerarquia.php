<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Jerarquia
 *
 * @property $id
 * @property $cargo_jefe
 * @property $cargo_dependiente
 * @property $created_at
 * @property $updated_at
 *
 * @property Cargo $cargo
 * @property Cargo $cargo
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Jerarquia extends Model
{
    
    static $rules = [
		'cargo_jefe' => 'required',
		'cargo_dependiente' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['cargo_jefe','cargo_dependiente'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function dependiente()
    {
        return $this->hasOne('App\Models\Cargo', 'id', 'cargo_dependiente');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function jefe()
    {
        return $this->hasOne('App\Models\Cargo', 'id', 'cargo_jefe');
    }
    

}
