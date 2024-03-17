<x-app-layout>
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
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->title }}</td>
                    <td>{{ $item->description }}</td>
                    <td>{{ $item->course->title }}</td>
                    <td>
                        <div class="btn-group btn-group-sm" role="group" aria-label="Small button group">
                            <a href="{{ route('modules.edit', $item->id) }}" class="btn btn-outline-primary rounded">Editar</a>
                            <form action="{{ route('modules.destroy', $item->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm ms-2">Eliminar</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>

</x-app-layout>
