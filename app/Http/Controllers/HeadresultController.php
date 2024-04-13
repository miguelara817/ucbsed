<?php

namespace App\Http\Controllers;

use App\Models\Headresult;
use Illuminate\Http\Request;

/**
 * Class HeadresultController
 * @package App\Http\Controllers
 */
class HeadresultController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $headresults = Headresult::paginate(10);

        return view('headresult.index', compact('headresults'))
            ->with('i', (request()->input('page', 1) - 1) * $headresults->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $headresult = new Headresult();
        return view('headresult.create', compact('headresult'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $version_formulario = $request->input('version');
        // $nivel = $request->input('nivel');

        // return view('');
        request()->validate(Headresult::$rules);

        $headresult = Headresult::create($request->all());

        return redirect()->route('headresults.index')
            ->with('success', 'Headresult created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $headresult = Headresult::find($id);

        return view('headresult.show', compact('headresult'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $headresult = Headresult::find($id);

        return view('headresult.edit', compact('headresult'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Headresult $headresult
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Headresult $headresult)
    {
        request()->validate(Headresult::$rules);

        $headresult->update($request->all());

        return redirect()->route('headresults.index')
            ->with('success', 'Headresult updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $headresult = Headresult::find($id)->delete();

        return redirect()->route('headresults.index')
            ->with('success', 'Headresult deleted successfully');
    }
}
