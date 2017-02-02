@extends('layouts.master')

@section('content')

	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<div class="panel panel-primary">
					<div class="panel-heading">Búsqueda de archivos</div>
					<div class="panel-body">
						<h1 class="text-center">Bienvenido, Investigador</h1>

						{!! Form::model(Request::all(), ['route' => 'inv-dashboard', 'method' => 'GET']) !!}
							<div class="row">
								
								<div class="col-xs-12 col-sm-3 col-md-3">
									<div class="form-group">
										{!! Form::select('collection', [
											'' => 'Seleccione',
											'libros'      => 'Libro',
	                                        'monografias' => 'Monografía',
	                                        'revistas'    => 'Revista',
	                                        'tesis'       => 'Tesis'
										], null, ['class' => 'form-control']) !!}
									</div>
								</div>
								
								<div class="col-xs-12 col-sm-9 col-md-9">
									
									<div class="input-group">								
										
										{!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Por favor ingrese los términos de su búsqueda']) !!}
										
										<span class="input-group-btn">
											<button class="btn btn-primary" type="submit">
												<i class="fa fa-search"></i>
											</button>
										</span>										
									</div>

								</div>

							</div>
						{!! Form::close() !!}						

						{{-- Si existen registros se procede a mostrar la tabla con los resultados --}}
						@if($items)
						<div class="alert alert-info text-right">
							<p>								
								<strong>Se encontraron <span class="badge">{{ $items->total() }}</span> registro(s)</strong>
							</p>							
						</div>
						<table class="table table-hover">
							<thead>
                            <tr>
                                <th>#</th>
                                <th>Título/Autor</th>                                
                                <th>Archivo</th>                                
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($items as $item)
                                <tr data-id = "{{ $item->item_id }}">
                                    <td>{{ $item->item_id }}</td>
                                    <td width="95%">
                                        {{ $item->title }} <br>
                                        <small><strong>{{ upper($item->author) }}</strong></small>
                                    </td>                                    
                                    <td width="5%" class="text-center">
                         				<a href="{{ route('item-detail', $item->item_id) }}"><i class="fa fa-download fa-2x"></i></a>
                                    </td>               
                                </tr>
                            @endforeach
                            </tbody>
						</table>
						{{ $items->appends(Request::only(['title', 'collection']))->links() }}
						@endif
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection