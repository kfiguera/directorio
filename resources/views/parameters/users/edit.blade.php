@section('plugins.Datatables', true)

@extends('adminlte::page')

@section('title', 'Usuarios')

@section('content_header')
    <h1>Usuarios</h1>
@stop

@section('content')

    {{-- Minimal example / fill data using the component slot --}}
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center ">
                <h5 class="card-title">Editar</h5>
            </div>
        </div>
        <form action="{{ route('users.update', ['user' => $user]) }}" method="post">
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
                    <label for="name">Nombre</label>
                    <input type="text" name="name" class="form-control" placeholder="Nombre"
                           value="{{ old('name',$user->name) }}">
                </div>
                <div class="form-group">
                    <label for="email">Correo Electrónico</label>
                    <input type="text" name="email" class="form-control" placeholder="Correo Electrónico"
                           value="{{ old('email',$user->email) }}">
                </div>
                <div class="form-group">
                    <label for="password">Contraseña</label>
                    <input type="password" name="password" class="form-control" placeholder="Contraseña"
                           value="{{ old('password') }}">
                </div>
                <div class="form-group">
                    <label for="password_confirmation">Confirmar Contraseña</label>
                    <input type="password" name="password_confirmation" class="form-control"
                           placeholder="Confirmar Contraseña"
                           value="{{ old('password_confirmation') }}">
                </div>
            </div>
            <div class="card-footer">
                <div class="d-flex justify-content-between align-items-center ">
                    <a href="{{ route('users.index') }}" class="btn btn-default" title="Volver">
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
