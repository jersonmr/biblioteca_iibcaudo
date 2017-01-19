@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        Listado de áreas
                        <a href="{{ route('create-area') }}" class="btn btn-success"> <i class="fa fa-plus-square"></i> Registrar Área </a>
                    </div>
                    <div class="panel-body">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Nombre</th>
                                <th>Descripción</th>
                                <th>Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($areas as $area)
                                <tr>
                                    <td>{{ $area->area_id }}</td>
                                    <td>{{ $area->name }}</td>
                                    <td>{{ $area->description }}</td>
                                    <td>
                                        <a href="#">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        |
                                        <a href="#">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
