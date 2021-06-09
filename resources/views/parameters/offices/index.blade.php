@section('plugins.Datatables', true)

@extends('adminlte::page')

@section('office', 'Oficinas')

@section('content_header')
    <h1>Oficinas</h1>
@stop

@section('content')
    @if(session('message'))
        <div class="row justify-content-center">
            <div class="col">
                <div class="alert alert-{{ session('message')[0] }}">

                    <h4 class="alert-heading">{{ __('Mensaje Informativo') }}  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button></h4>
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
                <a href="{{ route('offices.create') }}" class="btn btn-primary text-white" title="Nuevo">
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
                    <th class="col-auto">#</th>
                    <th class="col">Descripción</th>
                </tr>

                </thead>
                <tbody>
                @foreach($offices as $office)
                    <tr>
                        <td>
                            <div class="dropdown">
                                <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-fw fa-cog"></i>
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="{{ route('offices.edit',['office'=>$office]) }}">
                                        <i class="fas fa-pen-alt"></i> Editar
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <form action="{{route('offices.destroy',['office'=>$office])}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="dropdown-item" onclick="return confirm('¿Esta seguro de Eliminar el registro?')">
                                            <i class="fas fa-trash"></i> Eliminar
                                        </button>
                                    </form>

                                </div>
                            </div>
                        </td>


                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $office->description }}</td>
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
