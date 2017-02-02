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
								<h3>Autor</h3>
								<span>{{ $item->author }}</span>
							</div>
							<div class="col-xs-12 col-sm-3 col-md-3">
								<h3>Año de publicación</h3>
								<span>{{ $item->pub_year }}</span>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-12">
								<h3>Resumen</h3>
								<span>{{ $item->abstract }}</span>
							</div>

							<div class="col-xs-12 col-sm-8 col-md-8">
								<h3>Palabras clave</h3>
								<span>{{ $item->keywords }}</span>
							</div>
							<div class="col-xs-12 col-sm-2 col-md-2">
								<h3>Editorial</h3>
								<span>									
								@if($item->editorial != "")
									{{ $item->editorial }}
								@else
									N/A
								@endif
								</span>
							</div>
							<div class="col-xs-12 col-sm-2 col-md-2">
								<h3>Colección</h3>
								<span>{{ $item->collection }}</span>
							</div>

						</div>

						<div class="row">
							
							<div class="col-xs-12 col-sm-6 col-md-3">
								<h3>ISBN</h3>
								<span>									
								@if($item->isbn != "")
									{{ $item->isbn }}
								@else
									N/A
								@endif
								</span>
							</div>
							<div class="col-xs-12 col-sm-6 col-md-3">
								<h3>ISSN</h3>
								<span>									
								@if($item->issn != "")
									{{ $item->issn }}
								@else
									N/A
								@endif
								</span>
							</div>
							<div class="col-xs-12 col-sm-6 col-md-3">
								<h3>Páginas</h3>
								<span>									
								@if($item->pages != "")
									{{ $item->pages }}
								@else
									N/A
								@endif
								</span>
							</div>
							<div class="col-xs-12 col-sm-6 col-md-3">
								<h3>Volumen</h3>
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
								<a href="#" class="btn btn-primary">
									{{ getReaFileName($item->filename) }}
								</a>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>

@endsection