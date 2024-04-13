<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Confproce extends Model
{
    static $rules = [
		'form_version_id' => 'required',
		'fecha_inicio' => 'required',
		'fecha_conclusion' => 'required',
		'evaluador_id' => 'required',
		'evaluado_id' => 'required',
		'fortalezas' => 'required',
		'debilidades' => 'required',
		'comentarios_evaluador' => 'required',
		'propuestas' => 'required',
		'nota_final' => 'required',
		'recomendado' => 'required',
		'finalizacion' => 'required',
    ];

    protected $perPage = 20;

    protected $fillable = ['form_version_id','fecha_inicio','fecha_conclusion','evaluador_id','evaluado_id','fortalezas','debilidades','comentarios_evaluador','propuestas','nota_final','recomendado','finalizacion'];

    public function conformmodel()
    {
        return $this->hasOne('App\Models\Conformmodel', 'id', 'form_version_id');
    }

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
