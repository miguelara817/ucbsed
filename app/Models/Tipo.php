<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Tipo
 *
 * @property $id
 * @property $tipo_formulario
 * @property $created_at
 * @property $updated_at
 *
 * @property Formmodel[] $formmodels
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Tipo extends Model
{
    
    static $rules = [
		'tipo_formulario' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['tipo_formulario'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function formmodels()
    {
        return $this->hasMany('App\Models\Formmodel', 'tipo_id', 'id');
    }
    

}
