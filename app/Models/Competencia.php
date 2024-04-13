<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Competencia
 *
 * @property $id
 * @property $competencias
 * @property $created_at
 * @property $updated_at
 *
 * @property Factor[] $factors
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Competencia extends Model
{
    
    static $rules = [
		'competencias' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['competencias'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function factors()
    {
        return $this->hasMany('App\Models\Factor', 'competencia_id', 'id');
    }
    

}
