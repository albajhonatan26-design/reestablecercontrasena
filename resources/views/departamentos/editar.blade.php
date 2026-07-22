@extends('layouts.app')

@section('contenido')
<h1>Editar Departamento</h1>
    <form action="{{ route('departamentos.update',  $departamento->iddepartamento)}}" method="POST"> 
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value=" {{ $departamento->nombre }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>

@endsection