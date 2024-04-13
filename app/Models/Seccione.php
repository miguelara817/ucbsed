<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Seccione
 *
 * @property $id
 * @property $seccion
 * @property $area_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Area $area
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Seccione extends Model
{
    
    static $rules = [
		'seccion' => 'required',
		'area_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['seccion','area_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function area()
    {
        return $this->hasOne('App\Models\Area', 'id', 'area_id');
    }
    

}
