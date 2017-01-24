@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        Actualización de subarea
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-6 col-md-offset-3">                            
                                {!! Form::model($subarea, ['route' => ['update-subarea', $subarea->subarea_id]]) !!}                                    
                                    <div class="form-group">                                        
                                        {!! Form::label('name', "Nombre") !!}
                                        {!! Form::text('name', null, ['class' => 'form-control']) !!}
                                    </div>

                                    <div class="form-group">
                                        {!! Form::label('description', "Descripción") !!}
                                        {!! Form::textarea('description', null, ['class' => 'form-control', 'rows' => 5]) !!}
                                    </div>

                                    <div class="form-group">
                                        {!! Form::label('observations', "Observaciones") !!}
                                        {!! Form::textarea('observations', null, ['class' => 'form-control', 'rows' => 5]) !!}
                                    </div>

                                    <div class="form-group">
                                        {!! Form::submit('Actualizar subarea', ['class' => 'btn btn-success']) !!}
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