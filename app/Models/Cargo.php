<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Cargo
 *
 * @property $id
 * @property $cargo
 * @property $nivel_id
 * @property $area_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Area $area
 * @property Jerarquia[] $jerarquias
 * @property Jerarquia[] $jerarquias
 * @property Nivele $nivele
 * @property Personal[] $personals
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Cargo extends Model
{
    
    static $rules = [
		'cargo' => 'required',
		// 'nivel_id' => 'required',
		// 'area_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['cargo','nivel_id','area_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function area()
    {
        return $this->hasOne('App\Models\Area', 'id', 'area_id');
    }
    
    // /**
    //  * @return \Illuminate\Database\Eloquent\Relations\HasMany
    //  */
    // public function jerarquias_jefe()
    // {
    //     return $this->hasMany('App\Models\Jerarquia', 'cargo_jefe', 'id');
    // }
    
    // /**
    //  * @return \Illuminate\Database\Eloquent\Relations\HasMany
    //  */
    // public function jerarquias_dependiente()
    // {
    //     return $this->hasMany('App\Models\Jerarquia', 'cargo_dependiente', 'id');
    // }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function nivele()
    {
        return $this->hasOne('App\Models\Nivele', 'id', 'nivel_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function personals()
    {
        return $this->hasMany('App\Models\Personal', 'cargo_id', 'id');
    }
    

}
