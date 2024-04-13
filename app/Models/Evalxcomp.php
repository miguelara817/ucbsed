<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evalxcomp extends Model
{
    static $rules = [
		'evalresult_id' => 'required',
		'competencia' => 'required',
		'nota' => 'required',
    ];

    protected $perPage = 20;

    protected $fillable = ['evalresult_id','competencia','nota'];

    public function evalresult()
    {
        return $this->hasOne('App\Models\Evalresult', 'id', 'evalresult_id');
    }
}
