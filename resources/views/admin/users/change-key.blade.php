@extends('layouts.master')

@section('content')
	
	<div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
				<div class="row">
					<div class="col-xs-12 col-sm-6 col-sm-offset-3 col-md-6 col-md-offset3">
						<div class="panel panel-primary">
							<div class="panel-heading"><i class="fa fa-lock"></i> Cambie su contraseña</div>
							<div class="panel-body">
								@if(session('status'))
								<div class="alert alert-{{ session('type') }}">
									{{ session('status') }}
								</div>
								@endif
								{!! Form::open(['route' => 'update-key']) !!}
									<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
										{!! Form::label('email', 'Correo electrónico') !!}
										{!! Form::email('email', null, ['class' => 'form-control', 'required' => 'required']) !!}
										@if ($errors->has('email'))
	                                        <span class="help-block">
	                                            <strong>{{ $errors->first('email') }}</strong>
	                                        </span>
                                    	@endif
									</div>

									<div class="row">										

										<div class="form-group{{ $errors->has('oldpassword') ? ' has-error' : '' }} col-xs-12 col-sm-6 col-md-6">
											{!! Form::label('oldpassword', 'Contraseña actual') !!}
											{!! Form::password('oldpassword', ['class' => 'form-control', 'required' => 'required']) !!}
											@if ($errors->has('oldpassword'))
		                                        <span class="help-block">
		                                            <strong>{{ $errors->first('oldpassword') }}</strong>
		                                        </span>
	                                    	@endif
										</div>

										<div class="form-group{{ $errors->has('newpassword') ? ' has-error' : '' }} col-xs-12 col-sm-6 col-md-6">
											{!! Form::label('newpassword', 'Nueva contraseña') !!}
											{!! Form::password('newpassword', ['class' => 'form-control', 'required' => 'required']) !!}
											@if ($errors->has('newpassword'))
		                                        <span class="help-block">
		                                            <strong>{{ $errors->first('newpassword') }}</strong>
		                                        </span>
	                                    	@endif
										</div>

									</div>

									<div class="form-group">
										<button type="submit" class="btn btn-primary">Cambiar contraseña</button>
									</div>
								{!! Form::close() !!}
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection
