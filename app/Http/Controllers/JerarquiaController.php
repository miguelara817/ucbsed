<?php

namespace App\Http\Controllers;

use App\Models\Cargo;
use App\Models\Jerarquia;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Database\UniqueConstraintViolationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class JerarquiaController extends Controller
{
    public function index()
    {
        $relaciones = DB::select("SELECT DISTINCT id_jerarquias AS id, cargo_jefe_id, cargo_jefe, cargo_dependiente_id,cargos.cargo AS cargo_dependiente FROM
        (SELECT DISTINCT jerarquias.id AS id_jerarquias , jerarquias.cargo_jefe AS cargo_jefe_id,cargos.cargo AS cargo_jefe, jerarquias.cargo_dependiente AS cargo_dependiente_id FROM jerarquias
        INNER JOIN cargos ON cargos.id = jerarquias.cargo_jefe) AS cargoJefes
        INNER JOIN cargos ON cargos.id = cargoJefes.cargo_dependiente_id
        ORDER BY cargo_jefe");
        return view('jerarquia.index', compact('relaciones'))
            ->with('i');
    }

 
    public function create()
    {
        $jerarquia = new Jerarquia();
        $cargos = Cargo::orderBy('cargo')->get();
        return view('jerarquia.create', compact('jerarquia','cargos'));
    }


    public function store(Request $request)
    {
        try {
            $jerarquia = Jerarquia::create($request->all());
            return redirect()->route('jerarquias.index')
            ->with('success', 'Relación creada exitosamente.');
        } catch (UniqueConstraintViolationException $e) {
            $errorCode = $e->errorInfo[1];
            if($errorCode == 1062){
                return redirect()->back()->with('message','Ya existe la relación');
            }
        }
    }

    public function show($id)
    {
        $jerarquia = Jerarquia::find($id);

        return view('jerarquia.show', compact('jerarquia'));
    }

    public function edit($id)
    {
        $jerarquia = Jerarquia::find($id);
        $cargos = Cargo::orderBy('cargo')->get();
        return view('jerarquia.edit', compact('jerarquia','cargos'));
    }

    public function update(Request $request, Jerarquia $jerarquia)
    {
        $jerarquia->update($request->all());

        return redirect()->route('jerarquias.index')
            ->with('success', 'Relación actualizada exitosamente');
    }

    public function destroy($id)
    {
        $jerarquia = Jerarquia::find($id)->delete();

        return redirect()->route('jerarquias.index')
            ->with('success', 'Relación eliminada exitosamente');
    }

    
    public function print() {
        $num_relaciones = 0;
        $relaciones = DB::select("SELECT DISTINCT id_jerarquias AS id, cargo_jefe_id, cargo_jefe, cargo_dependiente_id,cargos.cargo AS cargo_dependiente FROM
        (SELECT DISTINCT jerarquias.id AS id_jerarquias , jerarquias.cargo_jefe AS cargo_jefe_id,cargos.cargo AS cargo_jefe, jerarquias.cargo_dependiente AS cargo_dependiente_id FROM jerarquias
        INNER JOIN cargos ON cargos.id = jerarquias.cargo_jefe) AS cargoJefes
        INNER JOIN cargos ON cargos.id = cargoJefes.cargo_dependiente_id
        ORDER BY cargo_jefe");

        $pdf =Pdf::loadView('jerarquia.print', compact('relaciones','num_relaciones'))
            ->setPaper('letter');
        return $pdf->stream();
        
    }
}
