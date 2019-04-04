@extends("layouts.app")

@section("content")
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card">
                <div class="card-header">{{ __('Cambiar Contraseña') }}</div>
                <div class="card-body">
				@if(Session::has('mensaje'))
				<div class="alert alert-success alert-dismissible" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					{{Session::get('mensaje')}}
				</div>
				@endif
                    <form method="POST" action="{{ route('PasswordChanged') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="password_actual" class="col-md-3 col-form-label text-md-right">{{ __('Contraseña Actual') }}</label>
                            <div class="col-md-8">
                                <input type="password" id="password_actual" name="password_actual" class="form-control" value="" />         
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nuevo_password" class="col-md-3 col-form-label text-md-right">{{ __('Nueva Contraseña') }}</label>

                            <div class="col-md-8">
                                <input type="password" id="nuevo_password" name="nuevo_password" class="form-control" value=""/>
                            </div>
                        </div>
						<div class="form-group row">
                            <label for="confirmar_password" class="col-md-3 col-form-label text-md-right">{{ __('Nueva Contraseña') }}</label>

                            <div class="col-md-8">
                                <input type="password" id="confirmar_password" name="confirmar_password" class="form-control" value=""/>
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