@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        Edición de usuario
                    </div>
                    <div class="panel-body">                        
                        {!! Form::model($user, ['route' => ['update-user', $user->user_id], 'method' => 'put', 'novalidate']) !!}
                            
                            <div class="row">

                                <div class="form-group{{ $errors->has('dni') ? ' has-error' : '' }} col-xs-12 col-sm-4 col-md-4">
                                    {!! Form::label('dni', 'Cédula de identidad') !!}
                                    {!! Form::text('dni', null, ['class' => 'form-control', 'autofocus' => 'autofocus', 'required' => 'required']) !!}
                                    @if ($errors->has('dni'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('dni') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('treatment') ? ' has-error' : '' }} col-xs-12 col-sm-4 col-md-4">
                                    {!! Form::label('treatment', 'Tratamiento') !!}
                                    {!! Form::select('treatment', [
                                        ''       => 'Seleccione',
                                        'Sr.'    => 'Sr.',
                                        'Sra.'   => 'Sra.',
                                        'Br.'    => 'Br.',
                                        'TSU.'   => 'TSU.',
                                        'Licdo.' => 'Licdo.',
                                        'Licda.' => 'Licda.',
                                        'Ing.'   => 'Ing.',
                                        'M.Sc.'  => 'M.Sc.',
                                        'Dr.'    => 'Dr.',
                                        'Dra.'   => 'Dra.'
                                    ], null, ['class' => 'form-control', 'required' => 'required']) !!} 
                                    @if ($errors->has('treatment'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('treatment') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }} col-xs-12 col-sm-4 col-md-4">
                                    {!! Form::label('name', 'Nombre') !!}
                                    {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) !!}
                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }} col-xs-12 col-sm-4 col-md-4">
                                    {!! Form::label('last_name', 'Apellido') !!}
                                    {!! Form::text('last_name', null, ['class' => 'form-control', 'required' => 'required']) !!}
                                    @if ($errors->has('last_name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('last_name') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} col-xs-12 col-sm-4 col-md-4">
                                    {!! Form::label('email', 'Correo electrónico') !!}
                                    {!! Form::email('email', null, ['class' => 'form-control', 'required' => 'required']) !!}
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('role') ? ' has-error' : '' }} col-xs-12 col-sm-4 col-md-4">
                                    {!! Form::label('role', 'Perfil') !!}
                                    {!! Form::select('role', [
                                        ''             => 'Seleccione',
                                        'investigator' => 'Investigador',
                                        'editor'       => 'Editor',                                        
                                    ], null, ['class' => 'form-control', 'required' => 'required']) !!}
                                    @if ($errors->has('role'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('role') }}</strong>
                                        </span>
                                    @endif
                                </div>

                            </div>                            

                            <div class="form-group" style="margin-top: 20px;">
                                <input type="submit" value="Actualizar usuario" class="btn btn-success">
                            </div>

                            
                        {!! Form::close() !!}                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection