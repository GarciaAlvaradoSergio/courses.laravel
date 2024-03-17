<x-app-layout>

    <h3>Cursos</h3>
    <hr />
    <div class="d-flex mb-3">
        <div class="p-2">
            <h5>Listado de cursos activos</h5>
        </div>
        <div class="ms-auto p-2">
            <a href="{{ route('courses.create') }}" class="btn btn-dark">Nuevo Curso</a>
        </div>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Titulo</th>
                <th scope="col">Descripción</th>
                <th scope="col">Creado por</th>
                <th>Fecha de creación</th>
                <th scope="col">Opciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($courses as $item)
                <tr>
                    <th>{{ $item->id }}</th>
                    <th>{{ $item->title }}</th>
                    <th>{{ Str::limit($item->description, 30) }}</th>
                    <th>{{ $item->user->name }}</th>
                    <th>{{ $item->created_at->format('j M Y') }}</th>
                    <th>
                        @if ($item->user->is(auth()->user()))
                            <div class="btn-group btn-group-sm" role="group" aria-label="Small button group">
                                <a href="{{ route('courses.edit', $item->id) }}"
                                   class="btn btn-outline-primary rounded">Editar</a>
                                <form action="{{ route('courses.destroy', $item->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm ms-2">Eliminar</button>
                                </form>
                            @else
                                <span class="badge text-bg-secondary">No tienes acceso</span>
                        @endif
                    </th>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-app-layout>
