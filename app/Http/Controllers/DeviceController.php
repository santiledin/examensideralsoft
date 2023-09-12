<?php

namespace App\Http\Controllers;

use App\Http\Requests\DeviceRequest;
use App\Models\Device;
use App\Models\Person;
use Illuminate\Http\Request;

class DeviceController extends Controller
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
    public function store(DeviceRequest $request)
    {
        Device::create($request->all());
        toastr()->success('DISPOSITIVO AGREGADO CON ÉXITO');
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
        $dispositivo = Device::find($id);
        return view('editDevice',compact('dispositivo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $dispositivo = Device::find($id);
        $dispositivo->update($request->all());
        toastr()->success('DISPOSITIVO ACTUALIZADO CON ÉXITO');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $dispositivo = Device::find($id);
        $dispositivo->delete();
        toastr()->success('DISPOSITIVO ELIMINADO CON ÉXITO');
        return redirect()->back();
    }
}
