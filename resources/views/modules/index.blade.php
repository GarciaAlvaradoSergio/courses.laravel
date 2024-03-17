@extends('layouts.app')

@section('content')
    <h3>Modulos</h3>
    <hr />
    <div class="d-flex mb-3">
        <div class="p-2">
            <h5>Listado de modulos activos</h5>
        </div>
        <div class="ms-auto p-2">
            <a href="{{ route('modules.create') }}" class="btn btn-dark">{{ __('Nuevo modulo') }}</a>
        </div>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Titulo</th>
                <th scope="col">Descripción</th>
                <th scope="col">Curso</th>
                <th scope="col">Opciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($modules as $item)
                <tr>
                    <th>{{ $item->id }}</th>
                    <th>{{ $item->title }}</th>
                    <th>{{ $item->description }}</th>
                    <th>{{ $item->course->title }}</th>
                    <th>
                        @if ($item->user && $item->user->id === auth()->user()->id)
                            <div class="btn-group btn-group-sm" role="group" aria-label="Small button group">
                                <a href="{{ route('modules.edit', $item->id) }}"
                                   class="btn btn-outline-primary rounded">Editar</a>
                                <form action="{{ route('modules.destroy', $item->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm ms-2">Eliminar</button>
                                </form>
                        @endif
                    </th>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection