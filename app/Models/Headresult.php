<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Headresult
 *
 * @property $id
 * @property $user_id
 * @property $nombre_evaluado
 * @property $cargo_evaluado
 * @property $nivel_evaluado
 * @property $nombre_evaluador
 * @property $cargo_evaluador
 * @property $nivel_evaluador
 * @property $version_form
 * @property $periodo_inicio
 * @property $periodo_final
 * @property $created_at
 * @property $updated_at
 *
 * @property Formmodel $formmodel
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Headresult extends Model
{
    
    static $rules = [
		'user_id' => 'required',
		'nombre_evaluado' => 'required',
		'cargo_evaluado' => 'required',
		'nivel_evaluado' => 'required',
		'nombre_evaluador' => 'required',
		'cargo_evaluador' => 'required',
		'nivel_evaluador' => 'required',
		'version_form' => 'required',
		'periodo_inicio' => 'required',
		'periodo_final' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id','nombre_evaluado','cargo_evaluado','nivel_evaluado','nombre_evaluador','cargo_evaluador','nivel_evaluador','version_form','periodo_inicio','periodo_final'];


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
