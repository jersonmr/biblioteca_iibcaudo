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
                                    {!! Form::select('area_id', $areas, null, ['class' => 'form-control', 'placeholder' => 'Seleccione área', 'required' => 'required']) !!}
                                    @if ($errors->has('area_id'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('area_id') }}</strong>
                                        </span>
                                    @endif
                        		</div>
                        		<div class="form-group{{ $errors->has('subarea_id') ? ' has-error' : '' }} col-xs-12 col-sm-6 col-md-6">
                        			{!! Form::label('subarea_id', "Subareas") !!}
                                    {!! Form::select('subarea_id', [], null, ['class' => 'form-control', 'placeholder' => 'Seleccione subarea', 'required' => 'required']) !!}
                                    @if ($errors->has('subarea_id'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('subarea_id') }}</strong>
                                        </span>
                                    @endif
                        		</div>
                        	</div>  

                        	<div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                        		{!! Form::label('title', 'Título') !!}
                        		{!! Form::text('title', null, ['class' => 'form-control', 'autofocus', 'required' => 'required']) !!}
                                @if ($errors->has('title'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                        	</div>

                            <div class="form-group{{ $errors->has('author') ? ' has-error' : '' }}">
                                {!! Form::label('author', 'Autor') !!}
                                {!! Form::text('author', null, ['class' => 'form-control', 'required' => 'required']) !!}
                                @if ($errors->has('author'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('author') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('abstract') ? ' has-error' : '' }}">
                                {!! Form::label('abstract', 'Resumen') !!}
                                {!! Form::textarea('abstract', null, ['class' => 'form-control', 'rows' => '7', 'required' => 'required']) !!}
                                @if ($errors->has('abstract'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('abstract') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('keywords') ? ' has-error' : '' }}">
                                {!! Form::label('keywords', 'Palabras clave') !!}
                                {!! Form::text('keywords', null, ['class' => 'form-control', 'required' => 'required']) !!}
                                @if ($errors->has('keywords'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('keywords') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="row">
                                <div class="col-xs-12 col-sm-4 col-md-4 form-group{{ $errors->has('pub_year') ? ' has-error' : '' }}">
                                    {!! Form::label('pub_year', 'Año de publicación') !!}
                                    {!! Form::text('pub_year', null, ['class' => 'form-control', 'placeholder' => 'aaaa', 'required' => 'required']) !!}
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
                                        'monografias' => 'Monografía',
                                        'revistas'    => 'Revista',
                                        'tesis'       => 'Tesis'
                                    ], null, ['class' => 'form-control', 'required' => 'required']) !!}
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
                                {!! Form::file('filename', ['class' => 'form-control filestyle', 'data-buttonText' => 'Seleccione archivo', 'data-iconName' => 'fa fa-folder', 'required' => 'required']) !!}
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

                            {{-- ID del usuario logueado --}}
                            {!! Form::hidden('user_id', Auth::user()->user_id) !!}

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
<script>
    $(document).ready(function(){
        $.fn.populateSelect = function(values) {            
            var options = '';
            $.each(values, function(key, row) {
                options += '<option value="' + row.subarea_id + '">' + row.name + '</option>';
            });
            $(this).html(options);
        }

        $('#area_id').change(function() {
            $('#subarea_id').empty();

            var area_id = $(this).val();
            
            if(area_id != '') {
                $.getJSON('/admin/listado-subareas-ajax/'+area_id, null, function(values) {
                    $('#subarea_id').populateSelect(values);
                });
            }
        });
    });
</script>
@endsection
