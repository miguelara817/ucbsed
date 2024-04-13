<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Arbolcargo
 *
 * @property $id
 * @property $cargo_dependiente
 * @property $nivel_id
 * @property $cargo_jefe
 * @property $created_at
 * @property $updated_at
 *
 * @property Jcargo $jcargo
 * @property Nivele $nivele
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Arbolcargo extends Model
{
    
    static $rules = [
		'cargo_dependiente' => 'required',
		'nivel_id' => 'required',
		'cargo_jefe' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['cargo_dependiente','nivel_id','cargo_jefe'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function jcargo()
    {
        return $this->hasOne('App\Models\Jcargo', 'id', 'cargo_jefe');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function nivele()
    {
        return $this->hasOne('App\Models\Nivele', 'id', 'nivel_id');
    }
    

}
