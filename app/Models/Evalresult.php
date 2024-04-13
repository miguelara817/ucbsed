<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Evalresult
 *
 * @property $id
 * @property $evalprocess_id
 * @property $evaluado_id
 * @property $evaluado_nivel_id
 * @property $evaluador_id
 * @property $fortalezas
 * @property $debilidades
 * @property $comentarios_evaluador
 * @property $propuestas
 * @property $nota_final
 * @property $comentarios_evaluado
 * @property $created_at
 * @property $updated_at
 *
 * @property Evaldetailsresult[] $evaldetailsresults
 * @property Evalproce $evalproce
 * @property Nivele $nivele
 * @property User $user
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Evalresult extends Model
{
    
    static $rules = [
		'evalprocess_id' => 'required',
		'evaluado_id' => 'required',
		'evaluado_nivel_id' => 'required',
		'evaluador_id' => 'required',
		'fortalezas' => 'required',
		'debilidades' => 'required',
		'comentarios_evaluador' => 'required',
		'propuestas' => 'required',
		'nota_final' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['evalprocess_id','evaluado_id','evaluado_nivel_id','evaluador_id','fortalezas','debilidades','comentarios_evaluador','propuestas','nota_final','comentarios_evaluado'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function evaldetailsresults()
    {
        return $this->hasMany('App\Models\Evaldetailsresult', 'evalresult_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function evalproce()
    {
        return $this->hasOne('App\Models\Evalproce', 'id', 'evalprocess_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function nivele()
    {
        return $this->hasOne('App\Models\Nivele', 'id', 'evaluado_nivel_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user_evaluador()
    {
        return $this->hasOne('App\Models\User', 'id', 'evaluador_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user_evaluado()
    {
        return $this->hasOne('App\Models\User', 'id', 'evaluado_id');
    }
    

}
