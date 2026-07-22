@extends('layouts.app')

@section('contenido')
<h1>Crea Departamento</h1>
    <form action="{{ route('departamentos.store') }}" method="POST"> 
        @csrf
        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" class="form-control" id="nombre" name="nombre" required>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>

@endsection