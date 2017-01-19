@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">Panel Administrador</div>
                <div class="panel-body">
                    <ul class="admin-menu">
						<li class="text-center">
							<i class="fa fa-users fa-4x"></i> <br>
							<a href="#">Usuarios</a>
						</li>
						<li class="text-center">
							<i class="fa fa-folder fa-5x"></i> <br> 
							<a href="#">Áreas</a>
						</li>
						<li class="text-center">
							<i class="fa fa-folder-o fa-5x"></i> <br> 
							<a href="#">Subareas</a>
						</li>
						<li class="text-center">
							<i class="fa fa-file-pdf-o fa-5x"></i> <br> 
							<a href="#">Items</a>
						</li>
					</ul>               
                </div>
                <div class="panel-footer">
                	<a href="{{ url('/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                		<i class="fa fa-sign-out fa-2x"></i> Cerrar sesión
            		</a>
            		<form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection