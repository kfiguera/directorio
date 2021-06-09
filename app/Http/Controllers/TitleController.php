<?php

namespace App\Http\Controllers;

use App\Http\Requests\TitleRequest;
use App\Models\Title;
use Illuminate\Http\Request;

class TitleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $titles = Title::all();
        return view('parameters.titles.index',compact('titles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = new Title();
        return view('parameters.titles.create',compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TitleRequest $request)
    {

        $title = Title::create([
            'description' => $request->description
        ]);
        return redirect()->route('titles.index')->with("message", ['success','Cargo creado correctamente']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Title  $title
     * @return \Illuminate\Http\Response
     */
    public function edit(Title $title)
    {
        return view('parameters.titles.edit',compact('title'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Title  $title
     * @return \Illuminate\Http\Response
     */
    public function update(TitleRequest $request, Title $title)
    {
        $title->update([
            'description' => $request->description
        ]);

        return redirect()->route('titles.index')->with("message", ['success','Cargo actualizado correctamente']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Title  $title
     * @return \Illuminate\Http\Response
     */
    public function destroy(Title $title)
    {
        $title->delete();

        return redirect()->route('titles.index')->with("message", ['success','Cargo eliminado correctamente']);
    }
}
