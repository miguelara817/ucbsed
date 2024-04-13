<?php

namespace App\Http\Controllers;

use App\Models\Evaldetailsresult;
use Illuminate\Http\Request;

/**
 * Class EvaldetailsresultController
 * @package App\Http\Controllers
 */
class EvaldetailsresultController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $evaldetailsresults = Evaldetailsresult::paginate(10);

        return view('evaldetailsresult.index', compact('evaldetailsresults'))
            ->with('i', (request()->input('page', 1) - 1) * $evaldetailsresults->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $evaldetailsresult = new Evaldetailsresult();
        return view('evaldetailsresult.create', compact('evaldetailsresult'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Evaldetailsresult::$rules);

        $evaldetailsresult = Evaldetailsresult::create($request->all());

        return redirect()->route('evaldetailsresults.index')
            ->with('success', 'Evaldetailsresult created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $evaldetailsresult = Evaldetailsresult::find($id);

        return view('evaldetailsresult.show', compact('evaldetailsresult'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $evaldetailsresult = Evaldetailsresult::find($id);

        return view('evaldetailsresult.edit', compact('evaldetailsresult'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Evaldetailsresult $evaldetailsresult
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Evaldetailsresult $evaldetailsresult)
    {
        request()->validate(Evaldetailsresult::$rules);

        $evaldetailsresult->update($request->all());

        return redirect()->route('evaldetailsresults.index')
            ->with('success', 'Evaldetailsresult updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $evaldetailsresult = Evaldetailsresult::find($id)->delete();

        return redirect()->route('evaldetailsresults.index')
            ->with('success', 'Evaldetailsresult deleted successfully');
    }
}
