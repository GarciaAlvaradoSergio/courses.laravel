<x-app-layout>
    <div class="d-flex">
        <div class="p-2">
            <h3>Usuarios</h3>
        </div>
        <div class="ms-auto p-2">
            <a href="{{ route('users.export') }}" class="btn btn-secondary">Exportar</a>
            <a href="#" class="btn btn-success">Importar</a>
        </div>
    </div>
    <hr />

    <div class="d-flex mb-3">
        <div class="p-2">
            <h5>Listado de Usuarios activos</h5>
        </div>
        <div class="ms-auto p-2">
            <a href="{{ route('users.create') }}" class="btn btn-dark">Nuevo Usuario</a>
        </div>
    </div>

    <table class="table table-responsive table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Correo</th>
                <th scope="col">Opciones</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            @foreach ($users as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->email }}</td>
                    <td>
                        <div class="btn-group btn-group-sm" role="group" aria-label="Small button group">

                            <a href="{{ route('users.edit', $item->id) }}"
                               class="btn btn-outline-primary rounded ms-2">Editar</a>
                            <a href="{{ route('users.show', $item->id) }}"
                               class="btn btn-outline-primary rounded ms-2">Ver</a>
                            <form action="{{ route('users.destroy', $item->id) }}" method="post">
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
