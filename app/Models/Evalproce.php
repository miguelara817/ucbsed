<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Evalproce
 *
 * @property $id
 * @property $form_version_id
 * @property $fecha_inicio
 * @property $fecha_conclusion
 * @property $created_at
 * @property $updated_at
 *
 * @property Assignment[] $assignments
 * @property Formmodel $formmodel
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Evalproce extends Model
{
    
    static $rules = [
        'texto_encabezado' => 'required',
		'form_version_id' => 'required',
		'fecha_inicio' => 'required',
		'fecha_conclusion' => 'required',
        'texto_instruccion' => 'required',
		'finalizacion' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['form_version_id', 'texto_encabezado','fecha_inicio','fecha_conclusion','texto_instruccion','finalizacion'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function assignments()
    {
        return $this->hasMany('App\Models\Assignment', 'evalprocess_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function formmodel()
    {
        return $this->hasOne('App\Models\Formmodel', 'id', 'form_version_id');
    }
    

}
