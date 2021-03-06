@extends("layouts.app")

@section("content")
<div class="container">
@if(Session::has('mensaje'))
	<div class="alert alert-success alert-dismissible" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		{{ Session::get('mensaje') }}
	</div>
@endif
@if(count($ContadorTotal)!=0)
<form method="GET" action="{{ route('UbicacionesMultipleDelete') }}">
	<div class="row">
	<h3>Listado de Ubicaciones o Departamentos</h3>
		<table class="table table-striped table-bordered">
			<thead align="center">
				<tr>
					<th scope="col"><input type="checkbox" id="SeleccionCompleta" name="SeleccionCompleta" title="Seleccionar Todos" /></th>
					<th scope="col">Id</th>
					<th scope="col">Ubicación o Departamento</th>
					<th scope="col">Cantidad</th>
					<th scope="col">Acción</th>
				</tr>
			</thead>
			<tbody>
			@foreach($ubicacion as $ubicaciones)
				@foreach($ContadorTotal as $contador)
					@if($ubicaciones->id == $contador->ubicacion_id)
						<tr align="center">
							<th scope="col"><input type="checkbox" id="ids" name="ids[]" value="{{ $ubicaciones->id }}" /></th>
							<td align="center">{{ $ubicaciones->id }}</td>
							<td>{{ $ubicaciones->nombre_ubicacion }}</td>
							<td align="center">{{ $contador->contador }}</td>
							<td align="center"><a href="/ubicaciones/{{ $contador->ubicacion_id }}/ubicacion" title="Detalles"><i class="far fa-eye"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="/ubicaciones/{{ $ubicaciones->id }}/edit" title="Editar"><i class="fas fa-edit"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="/ubicaciones/{{ $ubicaciones->id }}/delete" onclick="return confirm('¿Estás seguro de eliminar este elemento?')" title="Eliminar"><i class="fas fa-trash-alt"></i></a></td>
						</tr>
					@endif
				@endforeach
			@endforeach	
			</tbody>
		</table>
		<div class="col">
			{{ $ubicacion->onEachSide(3)->links() }}
		</div>
		<div class="col" align="right">
			<h5>Mostrando {{ $ubicacion->lastItem() }} de {{ $ubicacion->total() }} registros</h5>
		</div>
	</div>
	<div class="form-group row mb-0">
		<div class="col-md-5 offset-md-5">
			<button type="submit" id="eliminarseleccion" name="eliminarseleccion" class="btn btn-primary" onclick="return confirm('¿Estás seguro de eliminar los elementos seleccionados?')" disabled="disabled">
				{{ __('Eliminar Selección') }}
			</button>
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