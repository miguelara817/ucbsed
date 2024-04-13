<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Evaldetailsresult
 *
 * @property $id
 * @property $evalresult_id
 * @property $factor
 * @property $descripcion
 * @property $competencia
 * @property $ponderacion
 * @property $nota
 * @property $comentario
 * @property $created_at
 * @property $updated_at
 *
 * @property Evalresult $evalresult
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Evaldetailsresult extends Model
{
    
    static $rules = [
		'evalresult_id' => 'required',
		'factor' => 'required',
		'descripcion' => 'required',
		'competencia' => 'required',
		'ponderacion' => 'required',
		'nota' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['evalresult_id','factor','descripcion','competencia','ponderacion','nota','comentario'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function evalresult()
    {
        return $this->hasOne('App\Models\Evalresult', 'id', 'evalresult_id');
    }
    

}
