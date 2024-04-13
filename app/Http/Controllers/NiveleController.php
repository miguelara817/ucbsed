<?php

namespace App\Http\Controllers;

use App\Models\Nivele;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

/**
 * Class NiveleController
 * @package App\Http\Controllers
 */
class NiveleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $niveles = Nivele::paginate(10);

        return view('nivele.index', compact('niveles'))
            ->with('i', (request()->input('page', 1) - 1) * $niveles->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $nivele = new Nivele();
        return view('nivele.create', compact('nivele'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Nivele::$rules);

        $nivele = Nivele::create($request->all());

        return redirect()->route('niveles.index')
            ->with('success', 'Nivele created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $nivele = Nivele::find($id);

        return view('nivele.show', compact('nivele'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $nivele = Nivele::find($id);

        return view('nivele.edit', compact('nivele'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Nivele $nivele
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Nivele $nivele)
    {
        request()->validate(Nivele::$rules);

        $nivele->update($request->all());

        return redirect()->route('niveles.index')
            ->with('success', 'Nivele updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $nivele = Nivele::find($id)->delete();

        return redirect()->route('niveles.index')
            ->with('success', 'Nivele deleted successfully');
    }

    public function print()
    {
        $niveles = Nivele::get();
        $num_niveles = 0;
        $pdf =Pdf::loadView('nivele.print', compact('niveles','num_niveles'))
        ->setPaper('letter');
        return $pdf->stream();

        // return view('nivele.print', compact('niveles'))
        // ->with('i');
    }
}
