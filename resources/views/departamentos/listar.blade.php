@extends('layouts.app')

		@section('contenido')
			<h1>Lista de Departamentos</h1>
	        <a class="btn btn-primary" href="{{route('departamentos.create')}}">Crear Departamento</a>
			<table>
				<thead>
					<tr>
						<th>Código</th>
						<th>Nombre</th>
						<th>Acción</th>
						
					</tr>
				</thead>
				<tbody>
					@foreach($departamentos as $undepartamento)
						<tr>
							<td>{{ $undepartamento->iddepartamento }}</td>
							<td>{{ $undepartamento->nombre }}</td>
							<td><a class="btn btn-primary" href="{{ route('departamentos.edit', $undepartamento->iddepartamento)}}">Editar</a><td>



							<form style="display: inline;" action="{{ route('departamentos.destroy', $undepartamento->iddepartamento)}}"></form>
								@csrf
							@method('DELETE')
							<button 
								class="btn btn-sm btn-danger"
								type="submit"
								onclick="return confirm('¿Estas seguro de que deseas eliminar este departamento?')">Eliminar
							</button>
						</tr>
					@endforeach
				</tbody>
			</table>
		@endsection