<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Nivele
 *
 * @property $id
 * @property $nivel
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Nivele extends Model
{
    
    static $rules = [
		'nivel' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nivel'];



}
