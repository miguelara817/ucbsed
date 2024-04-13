<?php

namespace App\Http\Controllers;

use App\Models\Confirmassignment;
use Illuminate\Http\Request;

/**
 * Class ConfirmassignmentController
 * @package App\Http\Controllers
 */
class ConfirmassignmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $confirmassignments = Confirmassignment::paginate(10);

        return view('confirmassignment.index', compact('confirmassignments'))
            ->with('i', (request()->input('page', 1) - 1) * $confirmassignments->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $confirmassignment = new Confirmassignment();
        return view('confirmassignment.create', compact('confirmassignment'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Confirmassignment::$rules);

        $confirmassignment = Confirmassignment::create($request->all());

        return redirect()->route('confirmassignments.index')
            ->with('success', 'Confirmassignment created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $confirmassignment = Confirmassignment::find($id);

        return view('confirmassignment.show', compact('confirmassignment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $confirmassignment = Confirmassignment::find($id);

        return view('confirmassignment.edit', compact('confirmassignment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Confirmassignment $confirmassignment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Confirmassignment $confirmassignment)
    {
        request()->validate(Confirmassignment::$rules);

        $confirmassignment->update($request->all());

        return redirect()->route('confirmassignments.index')
            ->with('success', 'Confirmassignment updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $confirmassignment = Confirmassignment::find($id)->delete();

        return redirect()->route('confirmassignments.index')
            ->with('success', 'Confirmassignment deleted successfully');
    }
}
