<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Jcargo
 *
 * @property $id
 * @property $cargo
 * @property $nivel_id
 * @property $area_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Arbolcargo[] $arbolcargos
 * @property Area $area
 * @property Nivele $nivele
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Jcargo extends Model
{
    
    static $rules = [
		'cargo' => 'required',
		'nivel_id' => 'required',
		'area_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['cargo','nivel_id','area_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function arbolcargos()
    {
        return $this->hasMany('App\Models\Arbolcargo', 'cargo_jefe', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function area()
    {
        return $this->hasOne('App\Models\Area', 'id', 'area_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function nivele()
    {
        return $this->hasOne('App\Models\Nivele', 'id', 'nivel_id');
    }
    

}
