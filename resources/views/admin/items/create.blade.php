@extends('layouts.master')

@section('content')
	<div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        Registro de item
                    </div>
                    <div class="panel-body">                        
                        {!! Form::open(['route' => 'create-item', 'files' => true, 'class' => 'form']) !!}

                        	<div class="row">                        	
                        		<div class="form-group{{ $errors->has('area_id') ? ' has-error' : '' }} col-xs-12 col-sm-6 col-md-6">
                        			{!! Form::label('area_id', "Areas") !!}
                                    {!! Form::select('area_id', $areas, null, ['class' => 'form-control', 'placeholder' => 'Seleccione área']) !!}
                                    @if ($errors->has('area_id'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('area_id') }}</strong>
                                        </span>
                                    @endif
                        		</div>
                        		<div class="form-group{{ $errors->has('subarea_id') ? ' has-error' : '' }} col-xs-12 col-sm-6 col-md-6">
                        			{!! Form::label('subarea_id', "Subareas") !!}
                                    {!! Form::select('subarea_id', [], null, ['class' => 'form-control', 'placeholder' => 'Seleccione subarea']) !!}
                                    @if ($errors->has('subarea_id'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('subarea_id') }}</strong>
                                        </span>
                                    @endif
                        		</div>
                        	</div>  

                        	<div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                        		{!! Form::label('title', 'Título') !!}
                        		{!! Form::text('title', null, ['class' => 'form-control', 'autofocus']) !!}
                                @if ($errors->has('title'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                        	</div>

                            <div class="form-group{{ $errors->has('author') ? ' has-error' : '' }}">
                                {!! Form::label('author', 'Autor') !!}
                                {!! Form::text('author', null, ['class' => 'form-control']) !!}
                                @if ($errors->has('author'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('author') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('abstract') ? ' has-error' : '' }}">
                                {!! Form::label('abstract', 'Resumen') !!}
                                {!! Form::textarea('abstract', null, ['class' => 'form-control', 'rows' => '7']) !!}
                                @if ($errors->has('abstract'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('abstract') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('keywords') ? ' has-error' : '' }}">
                                {!! Form::label('keywords', 'Palabras clave') !!}
                                {!! Form::text('keywords', null, ['class' => 'form-control']) !!}
                                @if ($errors->has('keywords'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('keywords') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="row">
                                <div class="col-xs-12 col-sm-4 col-md-4 form-group{{ $errors->has('pub_year') ? ' has-error' : '' }}">
                                    {!! Form::label('pub_year', 'Año de publicación') !!}
                                    {!! Form::text('pub_year', null, ['class' => 'form-control', 'placeholder' => 'aaaa']) !!}
                                    @if ($errors->has('pub_year'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('pub_year') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="col-xs-12 col-sm-4 col-md-4 form-group">
                                    {!! Form::label('editorial', 'Editorial') !!}
                                    {!! Form::text('editorial', null, ['class' => 'form-control']) !!}
                                </div>
                                <div class="col-xs-12 col-sm-4 col-md-4 form-group{{ $errors->has('collection') ? ' has-error' : '' }}">
                                    {!! Form::label('collection', 'Colección') !!}
                                    {!! Form::select('collection', [
                                        '' => 'Seleccione una opción',
                                        'libros'      => 'Libro',
                                        'revistas'    => 'Revista',
                                        'monografias' => 'Monografía',
                                        'tesis'       => 'Tesis'
                                    ], null, ['class' => 'form-control']) !!}
                                    @if ($errors->has('collection'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('collection') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            
                            {{-- ARCHIVO PDF --}}
                            <div class="form-group{{ $errors->has('filename') ? ' has-error' : '' }}">
                                {!! Form::label('filename', 'Archivo PDF') !!}
                                {!! Form::file('filename', ['class' => 'form-control filestyle', 'data-buttonText' => 'Seleccione archivo', 'data-iconName' => 'fa fa-folder']) !!}
                                @if ($errors->has('filename'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('filename') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="row">
                                <div class="col-xs-12 col-sm-3 col-md-3">
                                    {!! Form::label('isbn', 'ISBN') !!}
                                    {!! Form::text('isbn', null, ['class' => 'form-control']) !!}
                                </div>
                                <div class="col-xs-12 col-sm-3 col-md-3">
                                    {!! Form::label('issn', 'ISSN') !!}
                                    {!! Form::text('issn', null, ['class' => 'form-control']) !!}
                                </div>
                                <div class="col-xs-12 col-sm-3 col-md-3">
                                    {!! Form::label('pages', 'Páginas') !!}
                                    {!! Form::text('pages', null, ['class' => 'form-control']) !!}
                                </div>
                                <div class="col-xs-12 col-sm-3 col-md-3">
                                    {!! Form::label('volume', 'Volumen') !!}
                                    {!! Form::text('volume', null, ['class' => 'form-control']) !!}
                                </div>
                            </div>

                            <div class="form-group" style="margin-top: 20px;">
                                <input type="submit" value="Registrar item" class="btn btn-success">
                            </div>

                            
                        {!! Form::close() !!}                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script type="text/javascript" src="{{ asset('js/bootstrap-filestyle.js') }}"> </script>
@endsection
