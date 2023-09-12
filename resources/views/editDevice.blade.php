@extends('layouts.layout')
@section('titulo', 'EDITAR DISPOSITIVO')
@section('contenido')
    <form class="border p-5 rounded-5 col mt-5 container mx-auto" method="POST" action="{{ route('device.update',$dispositivo['id']) }}">
        @method('put')
        @csrf
        <h1 class="text-center">EDITAR DISPOSITIVO</h1>
        <div class="mb-3">
            <label for="nombre" class="form-label">NOMBRE: </label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="{{$dispositivo['nombre']}}">
            @error('nombre')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="tipo" class="form-label">TIPO: </label>
            <input type="text" class="form-control" id="tipo" name="tipo" value="{{$dispositivo['tipo']}}">
            @error('tipo')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="mac_address" class="form-label">MAC_ADDRESS: </label>
            <input type="text" class="form-control" id="mac_address" name="mac_address" value="{{$dispositivo['mac_address']}}">
            @error('mac_address')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">EDITAR</button>
    </form>
@endsection
