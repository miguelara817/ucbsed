<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Select
 *
 * @property $id
 * @property $factor_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Factor $factor
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Select extends Model
{
    
    static $rules = [
		'factor_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['factor_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function factor()
    {
        return $this->hasOne('App\Models\Factor', 'id', 'factor_id');
    }
    

}
