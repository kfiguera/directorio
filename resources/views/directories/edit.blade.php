@section('plugins.Datatables', true)

@extends('adminlte::page')

@section('title', 'Directorio')

@section('content_header')
    <h1>Directorio</h1>
@endsection

@section('content')

    {{-- Minimal example / fill data using the component slot --}}
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center ">
                <h5 class="card-title">Editar</h5>
            </div>
        </div>
        <form action="{{ route('directories.update',compact('directory')) }}" method="post">
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
                    <label for="name">Nombre y Apellido</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="Nombre y Apellido"
                           value="{{ old('name',$directory->name) }}">
                </div>

                <div class="form-group">
                    <label for="id_number">Cédula</label>
                    <input type="text" name="id_number" id="id_number" class="form-control" placeholder="Cédula"
                           value="{{ old('id_number',$directory->id_number) }}">
                </div>

                <div class="form-group">
                    <label for="email">Correo Electrónico</label>
                    <input type="text" name="email" id="email" class="form-control" placeholder="Correo Electrónico"
                           value="{{ old('email',$directory->email) }}">
                </div>

                <div class="form-group">
                    <label for="phone">Teléfono</label>
                    <input type="text" name="phone" id="phone" class="form-control" placeholder="Teléfono"
                           value="{{ old('phone',$directory->phone) }}">
                </div>

                <div class="form-group">
                    <label for="extension">Extensión</label>
                    <input type="text" name="extension" id="extension" class="form-control" placeholder="Extensión"
                           value="{{ old('extension',$directory->extension) }}">
                </div>

                <div class="form-group">
                    <label for="title_id">Cargo</label>
                    <select name="title_id" id="title_id"  class="form-control">

                        <option value="">Seleccione</option>
                        @foreach($titles as $title)

                            <option
                                value="{{ $title->id }}" {{ old('title_id',$directory->title_id) == $title->id ? 'selected' : '' }}> {{ $title->description }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="office_id">Oficina</label>
                    <select name="office_id" id="office_id" class="form-control">

                        <option value="">Seleccione</option>
                        @foreach($offices as $office)

                            <option
                                value="{{ $office->id }}" {{ old('title_id',$directory->office_id) == $office->id ? 'selected' : '' }}> {{ $office->description }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="state_id">Estado</label>
                    <select name="state_id" id="state_id" class="form-control">

                        <option value="">Seleccione</option>
                        @foreach($states as $state)
                            <option
                                value="{{ $state->id }}" {{ old('title_id',$directory->state_id) == $state->id ? 'selected' : '' }}> {{ $state->description }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="card-footer">
                <div class="d-flex justify-content-between align-items-center ">
                    <a href="{{ route('directories.index') }}" class="btn btn-default" title="Volver">
                        <i class="fa fa-fw fa-chevron-left"> </i>
                        Volver
                    </a>
                    <button type="submit" class="btn btn-primary" title="Guardar">
                        Guardar
                        <i class="fa fa-fw fa-save"> </i>
                    </button>
                </div>
            </div>
        </form>
    </div>

@endsection

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@endsection

@section('js')
@endsection
