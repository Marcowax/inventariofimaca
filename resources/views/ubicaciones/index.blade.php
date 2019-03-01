@extends("layouts.app")

@section("content")
<div class="container">
@if(Session::has('mensaje'))
	<div class="alert alert-success alert-dismissible" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		{{Session::get('mensaje')}}
	</div>
@endif
@if(count($ubicaciones)!=0)
	<div class="row">
	<h3>Listado de Ubicaciones o Departamentos</h3>
		<table class="table table-striped table-bordered">
			<thead align="center">
				<tr>
					<th scope="col">Id</th>
					<th scope="col">Ubicación o Departamento</th>
					<th scope="col">Acción</th>
				</tr>
			</thead>
			<tbody>
			@foreach($ubicaciones as $ubicacion)
				<tr>
					<td align="center">{{ $ubicacion->id }}</td>
					<td>{{ $ubicacion->nombre_ubicacion }}</td>
					<td align="center"><a href="/ubicaciones/{{ $ubicacion->id }}/edit" title="Editar"><i class="fas fa-edit"></i></a><a href="/ubicaciones/{{ $ubicacion->id }}/delete" onclick="return confirm('¿Estás seguro de eliminar este elemento?')" title="Eliminar">&nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-trash-alt"></i></a></td>
				</tr>
			@endforeach
			</tbody>
		</table>
	</div>
@else
<div class="alert alert-primary alert-dismissible" role="alert">
	{{('No se encontró ningún registro')}}
</div>
@endif
</div>
@endsection