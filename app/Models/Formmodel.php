<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Formmodel
 *
 * @property $id
 * @property $creador
 * @property $tipo_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Formcontent[] $formcontents
 * @property Tipo $tipo
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Formmodel extends Model
{
    
    static $rules = [
		'creador' => 'required',
		// 'tipo_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['creador','descripcion'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function formcontents()
    {
        return $this->hasMany('App\Models\Formcontent', 'formmodel_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    // public function tipo()
    // {
    //     return $this->hasOne('App\Models\Tipo', 'id', 'tipo_id');
    // }
    

}
