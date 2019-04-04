@extends("layouts.app")

@section("content")
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card">
                <div class="card-header">{{ __('Edición de Usuario') }}</div>
                <div class="card-body">
				@if(Session::has('mensaje'))
				<div class="alert alert-success alert-dismissible" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					{{Session::get('mensaje')}}
				</div>
				@endif
                    <form method="POST" action="{{ route('UsersUpdate', $user->id) }}">
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-md-3 col-form-label text-md-right">{{ __('Nombre') }}</label>
                            <div class="col-md-8">
                                <input type="text" id="nombre" name="nombre" class="form-control" value="{{ $user->name }}" />         
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-md-3 col-form-label text-md-right">{{ __('E-Mail') }}</label>

                            <div class="col-md-8">
                                <input type="email" id="email" name="email" class="form-control" value="{{ $user->email }}"/>
                            </div>
                        </div>
						<div class="form-group row">
                            <label for="administrador" class="col-md-3 col-form-label text-md-right">{{ __('Administrador') }}</label>
                            <div class="col-md-8">
							<select id="administrador" name="administrador" class="form-control">
								<option value="{{ $user->administrator }}">{{$user->administrator}}</option>
								<option value="Sí">Sí</option>
								<option value="No">No</option>
							</select>
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