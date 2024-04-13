<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Bodyresult
 *
 * @property $id
 * @property $user_id
 * @property $version_form
 * @property $factor
 * @property $descripcion
 * @property $competencia
 * @property $ponderacion
 * @property $puntuacion
 * @property $comentario
 * @property $created_at
 * @property $updated_at
 *
 * @property Formmodel $formmodel
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Bodyresult extends Model
{
    
    static $rules = [
		'user_id' => 'required',
		'version_form' => 'required',
		'factor' => 'required',
		'descripcion' => 'required',
		'competencia' => 'required',
		'ponderacion' => 'required',
		'puntuacion' => 'required',
		'comentario' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id','version_form','factor','descripcion','competencia','ponderacion','puntuacion','comentario'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function formmodel()
    {
        return $this->hasOne('App\Models\Formmodel', 'id', 'version_form');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }
    

}
