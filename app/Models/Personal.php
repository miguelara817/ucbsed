<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Personal
 *
 * @property $id
 * @property $apellidos
 * @property $nombres
 * @property $nivel_id
 * @property $cargo_id
 * @property $area_id
 * @property $depto_id
 * @property $unidad_id
 * @property $seccion_id
 * @property $fecha_ingreso
 * @property $fecha_nacimiento
 * @property $doc_identidad
 * @property $expedido
 * @property $tipocontrato_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Area $area
 * @property Cargo $cargo
 * @property Contrato $contrato
 * @property Departamento $departamento
 * @property Nivele $nivele
 * @property Seccion $seccion
 * @property Unidad $unidad
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Personal extends Model
{
    
    static $rules = [
		'apellidos' => 'required',
		'nombres' => 'required',
		'nivel_id' => 'required',
		'cargo_id' => 'required',
		'area_id' => 'required',
		'depto_id' => 'required',
		'unidad_id' => 'required',
		'seccion_id' => 'required',
		'fecha_ingreso' => 'required',
		'fecha_nacimiento' => 'required',
		'doc_identidad' => 'required',
		'expedido' => 'required',
		'tipocontrato_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['apellidos','nombres','nivel_id','cargo_id','area_id','depto_id','unidad_id','seccion_id','fecha_ingreso','fecha_nacimiento','doc_identidad','expedido','tipocontrato_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function area()
    {
        return $this->hasOne('App\Models\Area', 'id', 'area_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function cargo()
    {
        return $this->hasOne('App\Models\Cargo', 'id', 'cargo_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function contrato()
    {
        return $this->hasOne('App\Models\Contrato', 'id', 'tipocontrato_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function departamento()
    {
        return $this->hasOne('App\Models\Departamento', 'id', 'depto_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function nivele()
    {
        return $this->hasOne('App\Models\Nivele', 'id', 'nivel_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function seccion()
    {
        return $this->hasOne('App\Models\Seccion', 'id', 'seccion_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function unidad()
    {
        return $this->hasOne('App\Models\Unidad', 'id', 'unidad_id');
    }
    

}
