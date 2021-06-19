@section('plugins.Datatables', true)

@extends('adminlte::page')

@section('title', 'Ubicación')

@section('content_header')
    <h1>Ubicación</h1>
@stop

@section('content')

    {{-- Minimal example / fill data using the component slot --}}
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center ">
                <h5 class="card-title">Editar</h5>
            </div>
        </div>
        <form action="{{ route('locations.update', ['location' => $location]) }}" method="post">
            @csrf
            @method('PUT')
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="form-group">
                    <label for="description">Descripción</label>
                    <input type="text" name="description" class="form-control" placeholder="Descripción"
                           value="{{ old('description',$location->description) }}">
                </div>
                <div class="form-group">
                    <label>¿Requiere Extension?</label>
                    <select class="form-control" name="extension" id="extension">
                        <option value="1" {{ (old('extension',$location->extension) == 1) ? 'selected' : '' }}>SI
                        </option>
                        <option value="0" {{ (old('extension',$location->extension) == 0) ? 'selected' : '' }}>NO
                        </option>
                    </select>
                </div>
            </div>
            <div class="card-footer">
                <div class="d-flex justify-content-between align-items-center ">
                    <a href="{{ route('locations.index') }}" class="btn btn-default" title="Volver">
                        <i class="fa fa-fw fa-chevron-left"> </i>
                        Volver
                    </a>
                    <button type="submit" class="btn btn-primary" title="Guardar">
                        Guardar
                        <i class="fa fa-fw fa-save"> </i>
                        </a>
                </div>
            </div>
        </form>
    </div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
@stop
