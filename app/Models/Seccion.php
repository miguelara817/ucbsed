<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Seccion
 *
 * @property $id
 * @property $seccion
 * @property $created_at
 * @property $updated_at
 *
 * @property Personal[] $personals
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Seccion extends Model
{
    
    static $rules = [
		'seccion' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['seccion'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function personals()
    {
        return $this->hasMany('App\Models\Personal', 'seccion_id', 'id');
    }
    

}
