@extends("layouts.app")

@section("content")
<div class="container">
@if(Session::has('mensaje'))
	<div class="alert alert-success alert-dismissible" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		{{Session::get('mensaje')}}
	</div>
@endif
@if(count($ContadorTotal)!=0)
<form method="GET" action="{{ route('InventariosMultipleDelete') }}">
	<div class="row">
	<h3>Contador de Inventario</h3>
		<table class="table table-striped table-bordered">
			<thead align="center">
				<tr>
					<th scope="col">Tipo de equipo</th>
					<th scope="col">Cantidad</th>
				</tr>
			</thead>
			<tbody>
			@foreach($ContadorTotal as $contador)
				@foreach($tipo as $tipos)
					@if($tipos->id == $contador->tipo_id && $contador->contador>0)
						<tr align="center">
							<td align="center">{{ $tipos->nombre_tipo }}</td>
							<td align="center">{{ $contador->contador }}</td>
						</tr>
					@endif
				@endforeach
			@endforeach	
			</tbody>
		</table>
	</div>
</form>
@else
<div class="alert alert-primary alert-dismissible" role="alert">
	{{('No se encontró ningún registro')}}
</div>
@endif
</div>
@endsection