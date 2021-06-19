@section('plugins.Datatables', true)

@extends('adminlte::page')

@section('title', 'Directorio')

@section('content_header')
    <h1>Directorio</h1>
@stop

@section('content')
    @if(session('message'))
        <div class="row justify-content-center">
            <div class="col">
                <div class="alert alert-{{ session('message')[0] }}">

                    <h4 class="alert-heading">{{ __('Mensaje Informativo') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </h4>
                    <div class="alert-body">
                        <p>{{ session('message')[1] }}</p>


                    </div>
                </div>
            </div>
        </div>
    @endif
    {{-- Minimal example / fill data using the component slot --}}
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center ">
                <h5 class="card-title">Listado</h5>
                <a href="{{ route('directories.create') }}" class="btn btn-primary text-white" title="Nuevo">
                    <i class="fa fa-lg fa-fw fa-plus"> </i>
                    Nuevo
                </a>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-striped table-bordered dataTable" id="listado">
                <thead>
                <tr>
                    <th class="col-auto">Acciones</th>
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
                        <td>
                            <div class="dropdown">
                                <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-fw fa-cog"></i>
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item"
                                       href="{{ route('directories.edit',['directory'=>$directory]) }}">
                                        <i class="fas fa-pen-alt"></i> Editar
                                    </a>
                                    {{--
                                    <div class="dropdown-divider"></div>
                                    <form action="{{route('directories.destroy',['directory'=> $directory])}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="dropdown-item" onclick="return confirm('¿Esta seguro de Eliminar el registro?')">
                                            <i class="fas fa-trash"></i> Eliminar
                                        </button>
                                    </form>
                                    --}}
                                </div>
                            </div>
                        </td>


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
