<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Confirmdetailsresult extends Model
{
    static $rules = [
		'confproces_id' => 'required',
		'factor' => 'required',
		'descripcion' => 'required',
		'ponderacion' => 'required',
		'nota' => 'required',
    ];

    protected $perPage = 20;

    protected $fillable = ['confproces_id','factor','descripcion','ponderacion','nota','comentario'];


    // public function confirmresult()
    // {
    //     return $this->hasOne('App\Models\Confirmresult', 'id', 'confirmresult_id');
    // }
    public function confproce()
    {
        return $this->hasOne('App\Models\Confproce', 'id', 'confproces_id');
    }
}
