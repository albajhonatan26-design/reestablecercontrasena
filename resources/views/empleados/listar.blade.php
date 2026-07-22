@extends('layouts.app')

		@section('contenido')
			<h1>Lista de Empleados</h1>
			<table>
				<thead>
					<tr>
						<th>Código</th>
						<th>Nombre</th>
						<th>Apellido</th>
						<th>Correo</th>
						<th>Estado</th>
						<th>Fecha Ingreso</th>
						<th>Fecha Retiro</th>
						<th>Sueldo</th>
					</tr>
				</thead>
				<tbody>
					@foreach($empleados as $unempleado)
						<tr>
							<td>{{ $unempleado->idempleado }}</td>
							<td>{{ $unempleado->nombre }}</td>
							<td>{{ $unempleado->apellido }}</td>
							<td>{{ $unempleado->email }}</td>
							<td>{{ $unempleado->estado }}</td>
							<td>{{ $unempleado->fechaingreso }}</td>
							<td>{{ $unempleado->fecharetiro }}</td>
							<td>{{ $unempleado->sueldo }}</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		@endsection