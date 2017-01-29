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
                                <tr data-id = "{{ $item->item_id }}">
                                    <td>{{ $item->item_id }}</td>
                                    <td width="85%">
                                        {{ $item->title }} <br>
                                        <small><strong>{{ upper($item->author) }}</strong></small>
                                    </td>                                    
                                    <td width="15%">
                                        <a href="{{ route('edit-item', $item->item_id) }}">
                                            <i class="fa fa-edit fa-2x"></i>
                                        </a>
                                        |
                                        <a href="#!" class="btn-delete">
                                            <i class="fa fa-trash fa-2x"></i>
                                        </a>
                                        |
                                        <a href="{{ route('item-file',  $item->item_id) }}" target="_blank">
                                            <i class="fa fa-file-pdf-o fa-2x" aria-hidden="true"></i>
                                        </a>
                                    </td>                                                                        
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{ $items->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
{!! Form::open(['route' => ['delete-item', ':ITEM_ID'], 'method' => 'DELETE', 'id' => 'frm-delete']) !!}
{!! Form::close() !!}
@endsection


@section('scripts')
<script>
    $(document).ready(function() {
        $('.btn-delete').click(function(e) {

            e.preventDefault();

            var row = $(this).parents('tr');
            var id = row.data('id');
            var form = $('#frm-delete');
            var url = form.attr('action').replace(':ITEM_ID', id);
            var data = form.serialize();

            row.fadeOut();

            $.post(url, data, function(result) {
                alert(result.message);
            }).fail(function() {
                alert('El registro no pudo ser eliminado');
                row.show();
            });
        });
    });
</script>
@endsection
