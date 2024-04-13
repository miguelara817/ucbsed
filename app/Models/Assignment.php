<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Assignment
 *
 * @property $id
 * @property $evalprocess_id
 * @property $evaluador_id
 * @property $evaluado_id
 * @property $evaluador_calificacion
 * @property $evaluado_calificacion
 * @property $finalizacion
 * @property $created_at
 * @property $updated_at
 *
 * @property Evalproce $evalproce
 * @property User $user
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Assignment extends Model
{
    
    static $rules = [
		'evalprocess_id' => 'required',
		'evaluador_id' => 'required',
		'evaluado_id' => 'required',
		'evaluador_calificacion' => 'required',
		'evaluado_calificacion' => 'required',
		'evaluado_deacuerdo' => 'required',
		'finalizacion' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['evalprocess_id','evaluador_id','evaluado_id','evaluador_calificacion','evaluado_calificacion','evaluado_deacuerdo','finalizacion'];


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
