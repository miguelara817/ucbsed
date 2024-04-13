<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Generador
 *
 * @property $id
 * @property $creador
 * @property $contrato
 * @property $evaluado
 * @property $puesto
 * @property $evaluador
 * @property $evaluador_puesto
 * @property $fecha_evaluacion
 * @property $fecha_cumplimiento
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Generador extends Model
{
    
    static $rules = [
		'creador' => 'required',
		'contrato' => 'required',
		'evaluado' => 'required',
		'puesto' => 'required',
		'evaluador' => 'required',
		'evaluador_puesto' => 'required',
		'fecha_evaluacion' => 'required',
		'fecha_cumplimiento' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['creador','contrato','evaluado','puesto','evaluador','evaluador_puesto','fecha_evaluacion','fecha_cumplimiento'];



}
