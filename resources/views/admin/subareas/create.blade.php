@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        Registro de subarea
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-6 col-md-offset-3">
                                {!! Form::open(['route' => 'create-subarea']) !!}    

                                    <div class="row">                                        
                                        <div class="form-group col-xs-12 col-sm-6 col-md-6">     
                                            {!! Form::label('area_id', "Areas") !!}
                                            {!! Form::select('area_id', $areas, null, ['class' => 'form-control', 'placeholder' => 'Seleccione área']) !!}
                                        </div>

                                        <div class="form-group col-xs-12 col-sm-6 col-md-6">     
                                            {!! Form::label('name', "Nombre") !!}
                                            {!! Form::text('name', null, ['class' => 'form-control']) !!}
                                        </div>
                                    </div>                              

                                    <div class="form-group">
                                        {!! Form::label('description', "Descripción") !!}
                                        {!! Form::text('description', null, ['class' => 'form-control']) !!}
                                    </div>

                                    <div class="form-group">
                                        {!! Form::label('observations', "Observaciones") !!}
                                        {!! Form::textarea('observations', null, ['class' => 'form-control', 'rows' => 5]) !!}
                                    </div>

                                    <div class="form-group">
                                        {!! Form::submit('Registrar subarea', ['class' => 'btn btn-success']) !!}
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