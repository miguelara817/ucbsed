<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Area
 *
 * @property $id
 * @property $area
 * @property $created_at
 * @property $updated_at
 *
 * @property Personal[] $personals
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Area extends Model
{
    
    static $rules = [
		'area' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['area'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function personals()
    {
        return $this->hasMany('App\Models\Personal', 'area_id', 'id');
    }
    // public function user()
    // {
    //     return $this->hasMany('App\Models\user', 'area_id', 'id');
    // }
    

}
