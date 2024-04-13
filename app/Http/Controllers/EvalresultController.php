<?php

namespace App\Http\Controllers;

use App\Models\Evalresult;
use Illuminate\Http\Request;

/**
 * Class EvalresultController
 * @package App\Http\Controllers
 */
class EvalresultController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $evalresults = Evalresult::paginate(10);

        return view('evalresult.index', compact('evalresults'))
            ->with('i', (request()->input('page', 1) - 1) * $evalresults->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $evalresult = new Evalresult();
        return view('evalresult.create', compact('evalresult'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Evalresult::$rules);

        $evalresult = Evalresult::create($request->all());

        return redirect()->route('evalresults.index')
            ->with('success', 'Evalresult created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $evalresult = Evalresult::find($id);

        return view('evalresult.show', compact('evalresult'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $evalresult = Evalresult::find($id);

        return view('evalresult.edit', compact('evalresult'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Evalresult $evalresult
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Evalresult $evalresult)
    {
        request()->validate(Evalresult::$rules);

        $evalresult->update($request->all());

        return redirect()->route('evalresults.index')
            ->with('success', 'Evalresult updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $evalresult = Evalresult::find($id)->delete();

        return redirect()->route('evalresults.index')
            ->with('success', 'Evalresult deleted successfully');
    }
}
