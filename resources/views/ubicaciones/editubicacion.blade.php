@extends("layouts.app")

@section("content")
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">{{ __('Edición de Ubicaciones o Departamento') }}</div>
                <div class="card-body">
				@if(Session::has('mensaje'))
				<div class="alert alert-success alert-dismissible" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					{{Session::get('mensaje')}}
				</div>
				@endif
                    <form method="POST" action="{{ route('UbicacionesUpdate', $ubicacion->id) }}">
                        @csrf
                        <div class="form-group row">
                            <label for="nombre_ubicacion" class="col-md-3 col-form-label text-md-right">{{ __('Ubicacion') }}</label>
                            <div class="col-md-8">
                                <input type="text" id="nombre_ubicacion" name="nombre_ubicacion" class="form-control" value="{{ $ubicacion->nombre_ubicacion }}" maxlength="30" autocomplete="off" />
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
                                    {{ __('Actualizar') }}
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