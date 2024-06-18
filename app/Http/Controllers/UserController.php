<?php

namespace App\Http\Controllers;

use App\Models\Arbolcargo;
use App\Models\Area;
use App\Models\Cargo;
use App\Models\Contrato;
use App\Models\Depto;
use App\Models\Jcargo;
use App\Models\Seccione;
use App\Models\Unidade;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Takielias\TablarKit\DataTable\DataTable;
use Takielias\TablarKit\Enums\ExportType;

class UserController extends Controller
{
    public function index() {

        // $users = User::orderBy('apellido')->paginate(10);
        $usersBusqueda = User::orderBy('apellido')->where('estado',1)->get();
        // return view('users.index', compact('users','usersBusqueda'))
        //     ->with('i', (request()->input('page', 1) - 1) * $users->perPage());
        return view('users.index', compact('usersBusqueda'))
                ->with('i');
        
    }

    public function buscar(Request $request){
        $usuario_id = $request->input('select-funcionario');
        $usuario = User::where('id',$usuario_id)->get();

        return view('users.buscar', compact('usuario','usuario_id'))
            ->with('i');
    }
    // public function edit($id){

       

    //     $cargos = Arbolcargo::orderBy('cargo_dependiente')->get();
    //     $tipo_contratos = Contrato::get();
    //     $cargos_jefe = Jcargo::get();
    //     $areas = Area::get();
    //     $departamentos = Depto::get();
    //     $unidades = Unidade::get();
    //     $secciones = Seccione::get();
    //     $user = User::find($id);

    //     return view('users.edit', compact('user', 'cargos'));

    //     // ,'cargos','tipo_contratos','cargos_jefe','areas','departamentos','unidades','secciones'
    // }

    public function editar($id){
        $cargos = Arbolcargo::orderBy('cargo_dependiente')->get();
        $tipo_contratos = Contrato::get();
        $cargos_jefe = Jcargo::get();
        $areas = Area::get();
        $departamentos = Depto::get();
        $unidades = Unidade::get();
        $secciones = Seccione::get();
        $user = User::find($id);

        $cargosid = Cargo::orderBy('cargo')->get();

        return view('users.editar', compact('user', 'cargos', 'cargosid','tipo_contratos','cargos_jefe','areas','departamentos','unidades','secciones'));

        // ,'cargos','tipo_contratos','cargos_jefe','areas','departamentos','unidades','secciones'
    }


    // public function show($id){
    //     $user = User::find($id);
    //     return view('users.editar', compact('user'));
    // }

    public function update(Request $request, User $user)
    {
        // request()->validate(User::$rules);

        $user->update($request->all());

        return redirect()->route('users.index')
            ->with('success', 'El usuario fue actualizado');
    }
    public function actualizar(Request $request)
    {
        // request()->validate(User::$rules);


        // $user->update($request->all());
        $user_id = $request->input('user');
        $user = User::find($user_id);

        $codigo = $request->input('codigo');
        $apellido = $request->input('apellido');
        $name = $request->input('name');
        $email = $request->input('email');
        $cargo_id = $request->input('cargo');
        $area_id = $request->input('area');
        $depto_id = $request->input('departamento');
        $unidad_id = $request->input('unidad');
        $seccion_id = $request->input('seccion');
        $fecha_ingreso = $request->input('fecha_ingreso');
        $fecha_nacimiento = $request->input('fecha_nacimiento');
        $doc_identidad = $request->input('doc_identidad');
        $tipocontrato = $request->input('tipocontrato');

        $user->update(['codigo' => $codigo, 'apellido'=>$apellido, 'name'=>$name, 'email'=>$email, 'id_cargo'=>$cargo_id, 'area_id'=>$area_id, 'depto_id'=>$depto_id,'unidad_id'=>$unidad_id, 'seccion_id'=>$seccion_id,'fecha_ingreso'=>$fecha_ingreso,'fecha_nacimiento'=>$fecha_nacimiento, 'doc_identidad'=>$doc_identidad,'tipocontrato'=>$tipocontrato]);

        return redirect()->route('users.index')
            ->with('success', 'El usuario fue actualizado');
        // return view('users.prueba', compact('user'));
    }

    public function crearUsuario() {
        $cargos = Arbolcargo::orderBy('cargo_dependiente')->get();
        $tipo_contratos = Contrato::all();
        $cargos_jefe = Jcargo::get();
        $areas = Area::get();
        $departamentos = Depto::get();
        $unidades = Unidade::get();
        $secciones = Seccione::get();

        $cargosid = Cargo::orderBy('cargo')->get();
        return view('users.registrar',compact('cargos', 'cargosid','tipo_contratos','cargos_jefe','areas','departamentos','unidades','secciones'));
        // return view('users.registrar');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'apellido' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    public function guardarUsuario(Request $request) {
        $codigo = $request->input('codigo');
        $apellido = $request->input('apellido');
        $name = $request->input('name');
        $email = $request->input('email');
        $password = $request->input('password');
        $cargo_id = $request->input('cargo');
        $area_id = $request->input('area');
        $depto_id = $request->input('departamento');
        $unidad_id = $request->input('unidad');
        $seccion_id = $request->input('seccion');
        $fecha_ingreso = $request->input('fecha_ingreso');
        $fecha_nacimiento = $request->input('fecha_nacimiento');
        $doc_identidad = $request->input('doc_identidad');
        $tipocontrato = $request->input('tipocontrato');

        // $this->validator($request->all())->validate();
        // $this->validator($request->all())->validate();

        if ($this->validator($request->all())->validate()) {
            $nuevoUsuario = User::create([
                'codigo' => $codigo,
                'apellido'=>strtoupper(trim($apellido)),
                'name'=>strtoupper(trim($name)),
                'email'=>$email,
                'password' => Hash::make($password),
                'id_cargo'=>$cargo_id,
                'area_id'=>$area_id,
                'depto_id'=>$depto_id,
                'unidad_id'=>$unidad_id,
                'seccion_id'=>$seccion_id,
                'fecha_ingreso'=>$fecha_ingreso,
                'fecha_nacimiento'=>$fecha_nacimiento,
                'doc_identidad'=>$doc_identidad,
                'tipocontrato'=>$tipocontrato
            ]);
            
            return redirect()->route('users.index')
                ->with('success', 'El usuario fue creado exitosamente');
    
        }
    
    }
    
    // Borrado lógico
    public function destroy($id)
    {
        // $user = User::find($id)->delete();
        $user = User::find($id)->update(['estado'=> 0]);
        
        return redirect()->route('users.index')
            ->with('success', 'El usuario fue eliminado exitosamente');
    }

    public function relusers() {
        // $reluser = DB::select('SELECT DISTINCT usersJefes.jerarquia_id, usersJefes.jefe_id, usersJefes.jefe_apellido, usersJefes.jefe_name, usersJefes.cargo_jefe_id, usersJefes.cargo_jefe, usersJefes.jefe_area ,usersJefes.dependiente_cargo_id, cargos.cargo ,users.id AS dependiente_id, users.apellido AS dependiente_apellido, users.name AS dependiente_name, users.area_id
        // FROM
        // (SELECT DISTINCT jerarquias.id AS jerarquia_id, users.id AS jefe_id, users.apellido AS jefe_apellido, users.name AS jefe_name, jerarquias.cargo_jefe AS cargo_jefe_id, cargos.cargo AS cargo_jefe, users.area_id AS jefe_area ,jerarquias.cargo_dependiente AS dependiente_cargo_id
        // FROM jerarquias
        // LEFT JOIN users ON jerarquias.cargo_jefe = users.id_cargo
        // LEFT JOIN cargos ON jerarquias.cargo_jefe = cargos.id) AS usersJefes
        // LEFT JOIN users ON users.id_cargo = usersJefes.dependiente_cargo_id
        // LEFT JOIN cargos ON usersJefes.dependiente_cargo_id = cargos.id
        // ORDER BY usersJefes.jefe_apellido;');

        // $reluser = DB::select('SELECT * FROM 
        // (SELECT DISTINCT usersJefes.jerarquia_id, usersJefes.jefe_id, usersJefes.jefe_apellido, usersJefes.jefe_name, usersJefes.cargo_jefe_id, usersJefes.cargo_jefe, usersJefes.jefe_area ,usersJefes.dependiente_cargo_id, cargos.cargo ,users.id AS dependiente_id, users.apellido AS dependiente_apellido, users.name AS dependiente_name, users.area_id
        // FROM
        // (SELECT DISTINCT jerarquias.id AS jerarquia_id, users.id AS jefe_id, users.apellido AS jefe_apellido, users.name AS jefe_name, jerarquias.cargo_jefe AS cargo_jefe_id, cargos.cargo AS cargo_jefe, users.area_id AS jefe_area ,jerarquias.cargo_dependiente AS dependiente_cargo_id
        // FROM jerarquias
        // LEFT JOIN users ON jerarquias.cargo_jefe = users.id_cargo
        // LEFT JOIN cargos ON jerarquias.cargo_jefe = cargos.id) AS usersJefes
        // LEFT JOIN users ON users.id_cargo = usersJefes.dependiente_cargo_id
        // LEFT JOIN cargos ON usersJefes.dependiente_cargo_id = cargos.id
        // ORDER BY usersJefes.jefe_apellido) AS relaciones
        // LEFT JOIN areas ON relaciones.area_id = areas.id;');

        $reluser = DB::select(
            'SELECT * FROM 
            (SELECT DISTINCT usersJefes.jerarquia_id, usersJefes.jefe_id, usersJefes.jefe_apellido, 
            usersJefes.jefe_name, usersJefes.jefe_estado,usersJefes.cargo_jefe_id, usersJefes.cargo_jefe, 
            usersJefes.jefe_area ,usersJefes.dependiente_cargo_id, cargos.cargo ,users.id AS dependiente_id, 
            users.apellido AS dependiente_apellido, users.name AS dependiente_name, users.estado AS dependiente_estado ,users.area_id
            FROM
            (SELECT DISTINCT jerarquias.id AS jerarquia_id, users.id AS jefe_id, users.apellido AS jefe_apellido, users.name AS jefe_name, users.estado AS jefe_estado,jerarquias.cargo_jefe AS cargo_jefe_id, cargos.cargo AS cargo_jefe, users.area_id AS jefe_area ,jerarquias.cargo_dependiente AS dependiente_cargo_id
            FROM jerarquias
            LEFT JOIN users ON jerarquias.cargo_jefe = users.id_cargo 
            LEFT JOIN cargos ON jerarquias.cargo_jefe = cargos.id) AS usersJefes
            LEFT JOIN users ON users.id_cargo = usersJefes.dependiente_cargo_id
            LEFT JOIN cargos ON usersJefes.dependiente_cargo_id = cargos.id
            ORDER BY usersJefes.jefe_apellido) AS relaciones
            LEFT JOIN areas ON relaciones.area_id = areas.id WHERE jefe_estado = 1 AND dependiente_estado = 1'
        );
        return view('users.relacion', compact('reluser'))
        ->with('i');
    }

    public function print() {
        $num_users = 0;
        $users = User::orderBy('apellido')->get();

        $pdf = Pdf::loadView('users.print', compact('num_users', 'users'))
                ->setPaper('letter', 'landscape');
        return $pdf->stream();
        // return view('users.print', compact('num_users','users'));
    }

    public function printRelaciones() {
        $num_relaciones = 0;
        $reluser = DB::select('SELECT DISTINCT usersJefes.jerarquia_id, usersJefes.jefe_id, usersJefes.jefe_apellido, usersJefes.jefe_name, usersJefes.cargo_jefe_id, usersJefes.cargo_jefe, usersJefes.jefe_area ,usersJefes.dependiente_cargo_id, cargos.cargo ,users.id AS dependiente_id, users.apellido AS dependiente_apellido, users.name AS dependiente_name, users.area_id
        FROM
        (SELECT DISTINCT jerarquias.id AS jerarquia_id, users.id AS jefe_id, users.apellido AS jefe_apellido, users.name AS jefe_name, jerarquias.cargo_jefe AS cargo_jefe_id, cargos.cargo AS cargo_jefe, users.area_id AS jefe_area ,jerarquias.cargo_dependiente AS dependiente_cargo_id
        FROM jerarquias
        LEFT JOIN users ON jerarquias.cargo_jefe = users.id_cargo
        LEFT JOIN cargos ON jerarquias.cargo_jefe = cargos.id) AS usersJefes
        LEFT JOIN users ON users.id_cargo = usersJefes.dependiente_cargo_id
        LEFT JOIN cargos ON usersJefes.dependiente_cargo_id = cargos.id
        ORDER BY usersJefes.jefe_apellido;');

        $pdf = Pdf::loadView('users.relprint', compact('num_relaciones', 'reluser'))
                ->setPaper('letter', 'landscape');
        return $pdf->stream();
        // return view('users.relprint', compact('num_relaciones', 'reluser'));
    }
}
