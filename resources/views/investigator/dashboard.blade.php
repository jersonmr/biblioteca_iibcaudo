@extends('layouts.master')

@section('content')

	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<div class="panel panel-primary">
					<div class="panel-heading">Búsqueda de archivos</div>
					<div class="panel-body">
						<h1 class="text-center">Bienvenido, Investigador</h1>
						{!! Form::open() !!}
							<div class="input-group">								
								{!! Form::text('search-file', null, ['class' => 'form-control', 'placeholder' => 'Por favor ingrese los términos de su búsqueda']) !!}
								<span class="input-group-btn">
									<button class="btn btn-primary" type="submit">
										<i class="fa fa-search"></i>
									</button>
								</span>
							</div>
						{!! Form::close() !!}
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection