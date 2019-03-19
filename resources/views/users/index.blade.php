@extends("layouts.app")

@section("content")
<div class="container">
@if(Session::has('mensaje'))
	<div class="alert alert-success alert-dismissible" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		{{ Session::get('mensaje') }}
	</div>
@endif
	<div class="row">
	<h3>Listado de Usuarios</h3>
		<table class="table table-striped table-bordered">
			<thead align="center">
				<tr>
					<th scope="col">Id</th>
					<th scope="col">Nombre</th>
					<th scope="col">Email</th>
					<th scope="col">Administrador</th>
					<th scope="col">Acción</th>
				</tr>
			</thead>
			<tbody>
			@foreach($users as $user)
				<tr>
					<td align="center">{{$user->id}}</td>
					<td>{{$user->name}}</td>
					<td>{{$user->email}}</td>
					<td align="center">{{$user->administrator}}</td>
					<td align="center"><a href="/users/{{ $user->id }}/edit" title="Editar"><i class="fas fa-edit"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;@if( $user->id != Auth::user()->id )<a href="/users/{{ $user->id }}/delete" onclick="return confirm('¿Estás seguro de eliminar este elemento?')" title="Eliminar"><i class="fas fa-trash-alt"></i></a>@endif</td>
				</tr>
			@endforeach
			</tbody>
		</table>
		<div class="col">
			{{ $users->onEachSide(3)->links() }}
		</div>
		<div class="col" align="right">
			<h5>Mostrando {{ $users->lastItem() }} de {{ $users->total() }} registros</h5>
		</div>
	</div>
</div>
@endsection