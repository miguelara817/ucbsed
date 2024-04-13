<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Confirmresult extends Model
{
    static $rules = [
		'confirmprocess_id' => 'required',
		'evaluado_id' => 'required',
		'evaluado_nivel_id' => 'required',
		'evaluador_id' => 'required',
		'fortalezas' => 'required',
		'debilidades' => 'required',
		'comentarios_evaluador' => 'required',
		'propuestas' => 'required',
		'nota_final' => 'required',
		'recomendado' => 'required',
    ];

    protected $perPage = 20;

    protected $fillable = ['confirmprocess_id','evaluado_id','evaluado_nivel_id','evaluador_id','fortalezas','debilidades','comentarios_evaluador','propuestas','nota_final'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function confirmdetailsresults()
    {
        return $this->hasMany('App\Models\Confirmdetailsresult', 'confirmprocess_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function confproce()
    {
        return $this->hasOne('App\Models\confproce', 'id', 'evalprocess_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function nivele()
    {
        return $this->hasOne('App\Models\Nivele', 'id', 'evaluado_nivel_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user_evaluador()
    {
        return $this->hasOne('App\Models\User', 'id', 'evaluador_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user_evaluado()
    {
        return $this->hasOne('App\Models\User', 'id', 'evaluado_id');
    }
}
