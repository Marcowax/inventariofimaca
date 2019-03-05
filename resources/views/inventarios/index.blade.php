@extends("layouts.app")

@section("content")
<div class="container">
@if(Session::has('mensaje'))
	<div class="alert alert-success alert-dismissible" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		{{Session::get('mensaje')}}
	</div>
@endif
@if(count($inventario)!=0)
<form method="GET" action="{{ route('InventariosMultipleDelete') }}">
	<div class="row">
	<h3>Listado de Inventario</h3>
		<table class="table table-striped table-bordered">
			<thead align="center">
				<tr>
					<th scope="col"><input type="checkbox" id="SeleccionCompleta" name="SeleccionCompleta" title="Seleccionar Todos" /></th>
					<th scope="col">Id</th>
					<th scope="col">Nombre del equipo</th>
					<th scope="col">Serial</th>
					<th scope="col">Marca</th>
					<th scope="col">Modelo</th>
					<th scope="col">Acción</th>
				</tr>
			</thead>
			<tbody>
			@foreach($inventario as $inventarios)
				<tr align="center">
					<th scope="col"><input type="checkbox" id="ids" name="ids[]" value="{{ $inventarios->id }}" /></th>
					<td align="center">{{ $inventarios->id }}</td>
					<td align="center">{{ $inventarios->nombre_equipo }}</td>
					<td>{{ $inventarios->serial }}</td>
					<td>{{ $inventarios->nombre_marca }}</td>
					<td>{{ $inventarios->modelo }}</td>
					<td align="center"><a href="/inventarios/{{ $inventarios->id }}/show" title="Visualizar"><i class="fas fa-search"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="/inventarios/{{ $inventarios->id }}/edit" title="Editar"><i class="fas fa-edit"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="/inventarios/{{ $inventarios->id }}/delete" onclick="return confirm('¿Estás seguro de eliminar este elemento?')" title="Eliminar"><i class="fas fa-trash-alt"></i></a></td>
				</tr>
			@endforeach
			</tbody>
		</table>
		<div class="col">
			{{ $inventario->render() }}
		</div>
		<div class="col" align="right">
			<h5>Mostrando {{ $inventario->lastItem() }} de {{ $inventario->total() }} registros</h5>
		</div>
	</div>
	<div class="form-group row mb-0">
		<div class="col-md-6 offset-md-4">
			<button type="submit" id="eliminarseleccion" name="eliminarseleccion" class="btn btn-primary" onclick="return confirm('¿Estás seguro de eliminar los elementos seleccionados?')" disabled="disabled">
				{{ __('Eliminar Selección') }}
			</button>&nbsp;&nbsp;&nbsp;&nbsp;<a href="{{ route('inventario.pdf') }}" class="btn btn-primary">
            Descargar inventario en PDF
        </a>
		</div>
	</div>
</form>
<script>
$('document').ready(function(){
	$("#SeleccionCompleta").change(function (){
		$("input:checkbox").prop('checked', $(this).prop("checked"));
		$('#eliminarseleccion').attr("disabled", false);
  
	if ($('#SeleccionCompleta').prop('checked')) {
		$('#eliminarseleccion').attr("disabled", false);
	}else{
		$('#eliminarseleccion').attr("disabled", true);
	}
});
});
</script>
@else
<div class="alert alert-primary alert-dismissible" role="alert">
	{{('No se encontró ningún registro')}}
</div>
@endif
</div>
@endsection