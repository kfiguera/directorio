@section('plugins.Datatables', true)

@extends('adminlte::page')

@section('title', 'Directorio')

@section('content_header')
    <h1>Directorio</h1>
@stop

@section('content')
    {{-- Minimal example / fill data using the component slot --}}
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center ">
                <h5 class="card-title">Listado</h5>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-striped table-bordered dataTable" id="listado">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Ext</th>
                    <th>Teléfono</th>
                    <th>Email</th>
                    <th>Cargo</th>
                    <th>Oficina</th>
                    <th>Estado</th>
                </tr>

                </thead>
                <tbody>
                @foreach($directories as $directory)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $directory->name }}</td>
                        <td>{{ $directory->extension }}</td>
                        <td>{{ $directory->phone }}</td>
                        <td>{{ $directory->email }}</td>
                        <td>{{ $directory->title->description }}</td>
                        <td>{{ $directory->office->description }}</td>
                        <td>{{ $directory->state->description }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>

        $(() => {
            $('#listado').DataTable([]);
        })
    </script>
@stop
