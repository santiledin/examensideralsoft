<?php

namespace App\Http\Controllers;

use App\Http\Requests\PersonRequest;
use App\Models\Device;
use App\Models\Person;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;

class PersonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PersonRequest $request)
    {
        Person::create($request->all());
        toastr()->success('PERSONA CREADA CON ÉXITO');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $usuario = Person::find($id);
        return view('editPerson',compact('usuario'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PersonRequest $request, string $id)
    {
        $persona = Person::find($id);
        $persona->update($request->all());
        toastr()->success('PERSONA ACTUALIZADA CON ÉXITO');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $persona = Person::find($id);
        $persona->delete();
        toastr()->success('PERSONA ELIMINADA CON ÉXITO');
        return redirect()->back();
    }
}
