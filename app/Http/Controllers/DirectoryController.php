<?php

namespace App\Http\Controllers;

use App\Http\Requests\DirectoryRequest;
use App\Models\Directory;
use App\Models\Office;
use App\Models\State;
use App\Models\Title;
use Illuminate\Http\Request;

class DirectoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $directories = Directory::all()->load('title','office','state');
        return view('directories.index', compact('directories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $directory = new Directory();
        $offices = Office::all();
        $states = State::all();
        $titles = Title::all();
        return view('directories.create',compact('directory','offices','states','titles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DirectoryRequest $request)
    {
        $directory = Directory::create(
            $request->all() +
            ['user_id' => auth()->user()->id]
        );

        return redirect()->route('directories.index')->with("message", ['success','Contacto creado correctamente']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Directory  $directory
     * @return \Illuminate\Http\Response
     */
    public function show(Directory $directory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Directory  $directory
     * @return \Illuminate\Http\Response
     */
    public function edit(Directory $directory)
    {
        $offices = Office::all();
        $states = State::all();
        $titles = Title::all();
        return view('directories.edit',compact('directory','offices','states','titles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Directory  $directory
     * @return \Illuminate\Http\Response
     */
    public function update(DirectoryRequest $request, Directory $directory)
    {
        $directory->update($request->all());

        return redirect()->route('directories.index')->with("message", ['success','Contacto actualizado correctamente']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Directory  $directory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Directory $directory)
    {
        $directory->delete();
        return redirect()->route('directories.index')->with("message", ['success','Contacto eliminado correctamente']);
    }
}
