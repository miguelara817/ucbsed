<?php

namespace App\Http\Controllers;

use App\Models\Factor;
use App\Models\Select;
use Illuminate\Http\Request;

/**
 * Class SelectController
 * @package App\Http\Controllers
 */
class SelectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $selects = Select::paginate(10);

        return view('select.index', compact('selects'))
            ->with('i', (request()->input('page', 1) - 1) * $selects->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $select = new Select();
        $factor = Factor::pluck('factor','id');
        return view('select.create', compact('select','factor'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Select::$rules);

        $select = Select::create($request->all());

        return redirect()->route('selects.index')
            ->with('success', 'Select created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $select = Select::find($id);

        return view('select.show', compact('select'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $select = Select::find($id);

        return view('select.edit', compact('select'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Select $select
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Select $select)
    {
        request()->validate(Select::$rules);

        $select->update($request->all());

        return redirect()->route('selects.index')
            ->with('success', 'Select updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $select = Select::find($id)->delete();

        return redirect()->route('selects.index')
            ->with('success', 'Select deleted successfully');
    }
}
