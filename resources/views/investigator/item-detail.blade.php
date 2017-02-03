@extends('layouts.master')

@section('content')

	<div class="container">
		<div class="row ">
			<div class="col-xs-12">
				<div class="panel panel-primary">
					<div class="panel-heading"><strong>{{ $item->title }}</strong></div>
					<div class="panel-body">
						<div class="row">														
							<div class="col-xs-12 col-sm-9 col-md-9">
								<h4>Autor</h4>
								<span>{{ $item->author }}</span>
							</div>
							<div class="col-xs-12 col-sm-3 col-md-3">
								<h4>Año de publicación</h4>
								<span>{{ $item->pub_year }}</span>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-12">
								<h4>Resumen</h4>
								<span>{{ $item->abstract }}</span>
							</div>

							<div class="col-xs-12 col-sm-8 col-md-8">
								<h4>Palabras clave</h4>
								<span>{{ $item->keywords }}</span>
							</div>
							<div class="col-xs-6 col-sm-2 col-md-2">
								<h4>Editorial</h4>
								<span>									
								@if($item->editorial != "")
									{{ $item->editorial }}
								@else
									N/A
								@endif
								</span>
							</div>
							<div class="col-xs-6 col-sm-2 col-md-2">
								<h4>Colección</h4>
								<span>{{ $item->collection }}</span>
							</div>

						</div>

						<div class="row">
							
							<div class="col-xs-6 col-sm-6 col-md-3">
								<h4>ISBN</h4>
								<span>									
								@if($item->isbn != "")
									{{ $item->isbn }}
								@else
									N/A
								@endif
								</span>
							</div>
							<div class="col-xs-6 col-sm-6 col-md-3">
								<h4>ISSN</h4>
								<span>									
								@if($item->issn != "")
									{{ $item->issn }}
								@else
									N/A
								@endif
								</span>
							</div>
							<div class="col-xs-6 col-sm-6 col-md-3">
								<h4>Páginas</h4>
								<span>									
								@if($item->pages != "")
									{{ $item->pages }}
								@else
									N/A
								@endif
								</span>
							</div>
							<div class="col-xs-6 col-sm-6 col-md-3">
								<h4>Volumen</h4>
								<span>									
								@if($item->volume != "")
									{{ $item->volume }}
								@else
									N/A
								@endif
								</span>
							</div>

						</div>

						<div class="row">
							<div class="col-xs-12 text-right">
								<a href="{{ route('item-file',  $item->item_id) }}" target="_blank" class="btn btn-primary">
									<i class="fa fa-download"></i> Descargar
								</a>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>

@endsection