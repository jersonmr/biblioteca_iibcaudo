@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        Listado de usuarios
                        <a href="{{ route('create-user') }}" class="btn btn-success"> <i class="fa fa-plus-square"></i> Registrar Usuario </a>
                    </div>
                    <div class="panel-body">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Usuario</th>                                
                                <th>Correo electrónico</th>                                    
                                <th>Perfil</th>                                    
                                <th>Acciones</th>                                
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $user->user_id }}</td>
                                        <td>{{ $user->fullname }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->role }}</td>
                                        <td>
                                            <a href="{{ route('edit-user', $user->user_id) }}">
                                                <i class="fa fa-edit fa-2x"></i>
                                            </a>
                                            |
                                            <a href="{{ route('delete-user', $user->user_id) }}" onclick="return confirm('Está seguro que desea eliminar el registro?');" class="btn-delete">
                                                <i class="fa fa-trash fa-2x"></i>
                                            </a>                                            
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $users->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
