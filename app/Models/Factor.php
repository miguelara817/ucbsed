<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Factor
 *
 * @property $id
 * @property $factor
 * @property $descripcion
 * @property $competencia_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Competencia $competencia
 * @property Formcontent[] $formcontents
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Factor extends Model
{
    
    static $rules = [
		'factor' => 'required',
		'descripcion' => 'required',
		'competencia_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['factor','descripcion','competencia_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function competencia()
    {
        return $this->hasOne('App\Models\Competencia', 'id', 'competencia_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function formcontents()
    {
        return $this->hasMany('App\Models\Formcontent', 'factor_id', 'id');
    }
    

}
