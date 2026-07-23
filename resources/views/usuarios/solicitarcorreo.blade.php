@extends('layouts.app')

@section('contenido')
<div class="container mt-4">
    <h2>Recuperar Contraseña</h2>

    {{-- Mensaje de éxito --}}
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    {{-- Errores de validación --}}
    @error('email')
        <div class="alert alert-danger">
            {{ $message }}
        </div>
    @enderror

    <form method="POST" action="{{ route('password.email') }}">
        @csrf
        
        <div class="mb-3">
            <label for="email" class="form-label">Correo electrónico:</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" required autofocus>
        </div>

        <button type="submit" class="btn btn-primary">Enviar enlace de recuperación</button>
    </form>
</div>
@endsection