<?php

namespace App\Http\Controllers;

use App\Models\Bodyresult;
use Illuminate\Http\Request;

/**
 * Class BodyresultController
 * @package App\Http\Controllers
 */
class BodyresultController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bodyresults = Bodyresult::paginate(10);

        return view('bodyresult.index', compact('bodyresults'))
            ->with('i', (request()->input('page', 1) - 1) * $bodyresults->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bodyresult = new Bodyresult();
        return view('bodyresult.create', compact('bodyresult'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Bodyresult::$rules);

        $bodyresult = Bodyresult::create($request->all());

        return redirect()->route('bodyresults.index')
            ->with('success', 'Bodyresult created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bodyresult = Bodyresult::find($id);

        return view('bodyresult.show', compact('bodyresult'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bodyresult = Bodyresult::find($id);

        return view('bodyresult.edit', compact('bodyresult'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Bodyresult $bodyresult
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bodyresult $bodyresult)
    {
        request()->validate(Bodyresult::$rules);

        $bodyresult->update($request->all());

        return redirect()->route('bodyresults.index')
            ->with('success', 'Bodyresult updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $bodyresult = Bodyresult::find($id)->delete();

        return redirect()->route('bodyresults.index')
            ->with('success', 'Bodyresult deleted successfully');
    }
}
