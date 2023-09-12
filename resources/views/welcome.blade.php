@extends('layouts.layout')
@section('titulo', 'INICIO')
@section('contenido')
    <section class="mt-5">
        <div class="container mx-auto gap-3">
            <form class="border p-5 rounded-5" method="POST" action="{{ route('person.store') }}">
                @csrf
                <h1 class="text-center">CREAR PERSONA</h1>
                <div class="mb-3">
                    <label for="nombres" class="form-label">NOMBRES: </label>
                    <input type="text" class="form-control" id="nombres" name="nombres">
                    @error('nombres')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="apellidos" class="form-label">APELLIDOS: </label>
                    <input type="text" class="form-control" id="apellidos" name="apellidos">
                    @error('apellidos')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="identificacion" class="form-label">IDENTIFICACIÓN: </label>
                    <input type="text" class="form-control" id="indentificacion" name="identificacion"  onkeypress="return soloNumeros(event)">
                    @error('identificacion')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="telefono" class="form-label">TELEFONO: </label>
                    <input type="text" class="form-control" id="telefono" name="telefono"  onkeypress="return soloNumeros(event)">
                    @error('telefono')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="correo" class="form-label">CORREO: </label>
                    <input type="email" class="form-control" id="correo" name="correo">
                    @error('correo')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">GUARDAR</button>
            </form>
            <div class="border rounded-5 p-5 mt-5">
                <table class="table col rounded-5" style="height:fit-content">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">NOMBES</th>
                            <th scope="col">APELLIDOS</th>
                            <th scope="col">CI</th>
                            <th scope="col">TELEFONO</th>
                            <th scope="col">CORREO</th>
                            <th scope="col">ACCIONES</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($personas as $persona)
                            <tr>
                                <th scope="row">{{ $persona['id'] }}</th>
                                <td>{{ $persona['nombres'] }}</td>
                                <td>{{ $persona['apellidos'] }}</td>
                                <td>{{ str_repeat('*', strlen($persona['identificacion']) - 3).substr($persona['identificacion'], -3) }}</td>
                                <td>{{ $persona['telefono'] }}</td>
                                <td>{{ $persona['correo']}}</td>
                                <td class="d-flex gap-3">
                                    <a href="{{route('person.edit',$persona['id'])}}" class="btn btn-success" rel="noopener norefereer"><i
                                            class="bi bi-eye-fill"></i></a>
                                            <form action="{{route('person.destroy',$persona['id'])}}" method="POST">
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
