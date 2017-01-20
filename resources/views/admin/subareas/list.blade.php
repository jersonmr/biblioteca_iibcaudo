@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        Listado de subareas
                        <a href="{{ route('create-subarea') }}" class="btn btn-success"> <i class="fa fa-plus-square"></i> Registrar Subarea </a>
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
                            @foreach($subareas as $subarea)
                                <tr>
                                    <td>{{ $subarea->subarea_id }}</td>
                                    <td>{{ $subarea->name }}</td>
                                    <td>{{ $subarea->description }}</td>
                                    <td>
                                        <a href="{{ route('edit-subarea', $subarea->subarea_id) }}">
                                            <i class="fa fa-edit fa-2x"></i>
                                        </a>
                                        |
                                        <a href="{{ route('delete-subarea', $subarea->subarea_id) }}">
                                            <i class="fa fa-trash fa-2x"></i>
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
