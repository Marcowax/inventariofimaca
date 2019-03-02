@extends("layouts.app")

@section("content")
<div class="container">
@if(Session::has('mensaje'))
	<div class="alert alert-success alert-dismissible" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		{{Session::get('mensaje')}}
	</div>
@endif
@if(count($marcas)!=0)
	<div class="row">
	<h3>Listado de Marcas</h3>
		<table class="table table-striped table-bordered">
			<thead align="center">
				<tr>
					<th scope="col">Id</th>
					<th scope="col">Nombre de la Marca</th>
					<th scope="col">Acción</th>
				</tr>
			</thead>
			<tbody>
			@foreach($marcas as $marca)
				<tr>
					<td align="center">{{$marca->id}}</td>
					<td>{{$marca->nombre_marca}}</td>
					<td align="center"><a href="/marcas/{{ $marca->id }}/edit" title="Editar"><i class="fas fa-edit"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="/marcas/{{ $marca->id }}/delete" onclick="return confirm('¿Estás seguro de eliminar este elemento?')" title="Eliminar"><i class="fas fa-trash-alt"></i></a></td>
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