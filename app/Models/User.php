<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'codigo',
        'name',
        'apellido',
        'email',
        'password',
        'cargo_id',
        'id_cargo',
        'area_id',
        'depto_id',
        'unidad_id',
        'seccion_id',
        'fecha_ingreso',
        'fecha_nacimiento',
        'doc_identidad',
        'tipocontrato_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function cargo()
    {
        return $this->hasOne('App\Models\cargo', 'id', 'id_cargo');
    }

    public function arbolcargo()
    {
        return $this->hasOne('App\Models\arbolcargo', 'id', 'cargo_id');
    }
    public function area()
    {
        return $this->hasOne('App\Models\area', 'id', 'area_id');
    }
    public function depto()
    {
        return $this->hasOne('App\Models\depto', 'id', 'depto_id');
    }
    public function seccione()
    {
        return $this->hasOne('App\Models\seccione', 'id', 'seccion_id');
    }
    public function unidade()
    {
        return $this->hasOne('App\Models\unidade', 'id', 'unidad_id');
    }

    public function contrato()
    {
        return $this->hasOne('App\Models\Contrato', 'id', 'tipocontrato_id');
    }
}
