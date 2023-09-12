@extends('layouts.layout')
@section('titulo','EDITAR PERSONA')
@section('contenido')
<section class="mt-5">
    <div class="container mx-auto gap-3 row">
        <form class="border p-5 rounded-5 col" method="POST" action="{{ route('person.update',$usuario['id']) }}">
            @method('PUT')
            @csrf
            <h1 class="text-center">EDITAR PERSONA</h1>
            <div class="mb-3">
                <label for="nombres" class="form-label">NOMBRES: </label>
                <input type="text" class="form-control" id="nombres" name="nombres" value="{{$usuario['nombres']}}">
                @error('nombres')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="apellidos" class="form-label">APELLIDOS: </label>
                <input type="text" class="form-control" id="apellidos" name="apellidos" value="{{$usuario['apellidos']}}">
                @error('apellidos')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="identificacion" class="form-label">IDENTIFICACIÓN: </label>
                <input type="text" class="form-control" id="indentificacion" name="identificacion" value="{{$usuario['identificacion']}}"  onkeypress="return soloNumeros(event)">
                @error('identificacion')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="telefono" class="form-label">TELEFONO: </label>
                <input type="text" class="form-control" id="telefono" name="telefono" value="{{$usuario['telefono']}}"  onkeypress="return soloNumeros(event)">
                @error('telefono')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="correo" class="form-label">CORREO: </label>
                <input type="email" class="form-control" id="correo" name="correo" value="{{$usuario['correo']}}">
                @error('correo')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">ACTUALIZAR</button>
        </form>
        <form class="border p-5 rounded-5 col" method="POST" action="{{ route('device.store')}}">
            @csrf
            <h1 class="text-center">AGREGAR DISPOSITIVO</h1>
            <div class="mb-3">
                <label for="nombre" class="form-label">NOMBRE: </label>
                <input type="text" class="form-control" id="nombre" name="nombre">
                <input type="text" class="form-control" id="person_id" name="person_id" style="display:none" value="{{$usuario->id}}">
                @error('nombre')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="tipo" class="form-label">TIPO: </label>
                <input type="text" class="form-control" id="tipo" name="tipo">
                @error('tipo')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="mac_address" class="form-label">MAC_ADDRESS: </label>
                <input type="text" class="form-control" id="mac_address" name="mac_address">
                @error('mac_address')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">AGREGAR</button>
        </form>
        <div class="border rounded-5 p-5 mt-5">
            <table class="table col rounded-5" style="height:fit-content">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">NOMBE</th>
                        <th scope="col">TIPO</th>
                        <th scope="col">MAC_ADDRESS</th>
                        <th scope="col">ACCIONES</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($usuario->devices as $dispositivo)
                        <tr>
                            <th scope="row">{{ $dispositivo['id'] }}</th>
                            <td>{{ $dispositivo['nombre'] }}</td>
                            <td>{{ $dispositivo['tipo'] }}</td>
                            <td>{{ $dispositivo['mac_address'] }}</td>
                            <td class="d-flex gap-2">
                                <a href="{{route('device.edit',$dispositivo['id'])}}" class="btn btn-success" rel="noopener norefereer"><i
                                        class="bi bi-eye-fill"></i></a>
                                <form action="{{route('device.destroy',$dispositivo['id'])}}" method="POST">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="btn btn-danger" rel="noopener norefereer"><i class="bi bi-trash-fill"></i></button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <p>NO EXISTEN REGISTROS</p>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</section>
@endsection