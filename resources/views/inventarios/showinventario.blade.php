@extends("layouts.app")

@section("content")
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card">
                <div class="card-header">{{ __('Información del Equipo') }}</div>
                <div class="card-body">
				@if(Session::has('mensaje'))
				<div class="alert alert-success alert-dismissible" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					{{Session::get('mensaje')}}
				</div>
				@endif
                    <form method="GET" action="/inventarios/{{ $inventario->id }}/edit">
                        @csrf
                        <div class="form-group row">
                            <label for="nombre_equipo" class="col-md-3 col-form-label text-md-right">{{ __('Nombre del equipo') }}</label>

                            <div class="col-md-8">
                                <input type="text" id="nombre_equipo" name="nombre_equipo" class="form-control" value="{{ $inventario->nombre_equipo }}" readonly="readonly" />
                                
                            </div>
                        </div>
						<div class="form-group row">
                            <label for="serial" class="col-md-3 col-form-label text-md-right">{{ __('Serial') }}</label>

                            <div class="col-md-8">
                                <input type="text" id="serial" name="serial" class="form-control" value="{{ $inventario->serial }}" readonly="readonly" />
                                
                            </div>
                        </div>
						<div class="form-group row">
                            <label for="marca" class="col-md-3 col-form-label text-md-right">{{ __('Marca') }}</label>

                            <div class="col-md-8">
								<input type="text" id="marca" name="marca" class="form-control" value="{{ $marca_actual->nombre_marca }}" readonly="readonly" />
                            </div>
                        </div>
						<div class="form-group row">
                            <label for="modelo" class="col-md-3 col-form-label text-md-right">{{ __('Modelo') }}</label>

                            <div class="col-md-8">
                                <input type="text" id="modelo" name="modelo" class="form-control" value="{{ $inventario->modelo }}" readonly="readonly" />
                                
                            </div>
                        </div>
						<div class="form-group row">
                            <label for="tipo" class="col-md-3 col-form-label text-md-right">{{ __('Tipo de equipo') }}</label>

                            <div class="col-md-8">
								<input type="text" id="tipo" name="tipo" class="form-control" value="{{ $tipo_actual->nombre_tipo }}" readonly="readonly" />
                            </div>
                        </div>
						<div class="form-group row">
                            <label for="ubicacion" class="col-md-3 col-form-label text-md-right">{{ __('Ubicación o Dpto.') }}</label>

                            <div class="col-md-8">
								<input type="text" id="ubicacion" name="ubicacion" class="form-control" value="{{ $ubicacion_actual->nombre_ubicacion }}" readonly="readonly" />
                            </div>
                        </div>
						<div class="form-group row">
                            <label for="fecha_registro" class="col-md-3 col-form-label text-md-right">{{ __('Fecha de registro') }}</label>

                            <div class="col-md-8">
                                <input type="text" id="fecha_registro" name="fecha_registro" class="form-control" value="{{  $inventario->fecha_registro }}" readonly="readonly" /></div>
                        </div>
						<div class="form-group row">
                            <label for="activo" class="col-md-3 col-form-label text-md-right">{{ __('¿Activo?') }}</label>

                            <div class="col-md-8">
								<input type="text" id="activo" name="activo" class="form-control" value="{{  $inventario->activo }}" readonly="readonly" />
                            </div>
                        </div>
						@if ($errors->any())
						<div class="alert alert-danger">
							<ul>
							@foreach ($errors->all() as $error)
								<li>{{ $error }}</li>
							@endforeach
							</ul>
						</div>
						@endif
                        <div class="form-group row mb-0">
                            <div class="col-md-5 offset-md-5">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Modificar') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection