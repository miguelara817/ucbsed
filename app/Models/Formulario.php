<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Formulario
 *
 * @property $id
 * @property $factores
 * @property $descripcion
 * @property $puntuacion
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Formulario extends Model
{
    
    static $rules = [
		'factores' => 'required',
		'descripcion' => 'required',
		'puntuacion' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['factores','descripcion','puntuacion'];



}
