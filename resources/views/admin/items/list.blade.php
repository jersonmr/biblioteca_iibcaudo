@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        Listado de items
                        <a href="{{ route('create-item') }}" class="btn btn-success"> <i class="fa fa-plus-square"></i> Registrar Item </a>
                    </div>
                    <div class="panel-body">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Título/Autor</th>                                
                                <th>Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($items as $item)
                                <tr>
                                    <td>{{ $item->item_id }}</td>
                                    <td>
                                        {{ $item->title }} <br>
                                        <small>{{ $item->author }}</small>
                                    </td>                                    
                                    <td>
                                        <a href="{{ route('edit-item', $item->item_id) }}">
                                            <i class="fa fa-edit fa-2x"></i>
                                        </a>
                                        |
                                        <a href="{{ route('delete-item', $item->area_id) }}">
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
