<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Unidad
 *
 * @property $id
 * @property $unidad
 * @property $created_at
 * @property $updated_at
 *
 * @property Personal[] $personals
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Unidad extends Model
{
    
    static $rules = [
		'unidad' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['unidad'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function personals()
    {
        return $this->hasMany('App\Models\Personal', 'unidad_id', 'id');
    }
    

}
