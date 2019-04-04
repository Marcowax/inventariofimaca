@extends("layouts.app")

@section("content")
<div class="container">
@if(Session::has('mensaje'))
	<div class="alert alert-success alert-dismissible" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		{{Session::get('mensaje')}}
	</div>
@endif
<form method="GET" action="{{ route('InventariosMultipleDelete') }}">
	<div class="row">
	<h3>Listado de {{ $marca->nombre_marca }}</h3>
		<table class="table table-striped table-bordered">
			<thead align="center">
				<tr>
					<th scope="col">Nombre del equipo</th>
					<th scope="col">Serial</th>
					<th scope="col">Modelo</th>
					<th scope="col">Acción</th>
				</tr>
			</thead>
			<tbody>
			@foreach($equipo as $equipos)
				<tr align="center">
					<td align="center">{{ $equipos->nombre_equipo }}</td>
					<td align="center">{{ $equipos->serial }}</td>
					<td align="center">{{ $equipos->modelo }}</td>
					<td align="center"><a href="/inventarios/{{ $equipos->id }}/show" title="Visualizar"><i class="fas fa-search"></i></a></td>
				</tr>
			@endforeach	
			</tbody>
		</table>
	</div>
</form>
@endsection