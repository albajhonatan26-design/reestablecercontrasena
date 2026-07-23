@extends('layouts.app')

@section('contenido')
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Recuperar Contraseña</title>
</head>
<body>
    <h2>Recuperar Contraseña</h2>

    @if (session('status'))
        <p style="color: green;">{{ session('status') }}</p>
    @endif

    @error('email')
        <p style="color: red;">{{ $message }}</p>
    @enderror

    <form method="POST" action="{{ route('password.email') }}">
        @csrf
        <div>
            <label for="email">Correo electrónico:</label>
            <input type="email" name="email" id="email" value="{{ old('email') }}" required autofocus>
        </div>
        <button type="submit">Enviar enlace de recuperación</button>
    </form>
</body>
</html>
@endsection