<x-app-layout>
    <h3>Lecciones</h3>
    <hr />
    <div class="d-flex mb-3">
        <div class="p-2">
            <h5>Listado de lecciones activas</h5>
        </div>
        <div class="ms-auto p-2">
            <a href="{{ route('lessons.create') }}" class="btn btn-dark">{{ __('Nueva lección') }}</a>
        </div>
    </div>


    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Titulo</th>
                <th scope="col">Descripción</th>
                <th scope="col">Contenido</th>
                <th scope="col">Modulo</th>
                <th scope="col">Opciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($lessons as $item)
                <tr>
                    <th>{{ $item->id }}</th>
                    <th>{{ $item->title }}</th>
                    <th>{{ $item->description }}</th>
                    <th>{{ Str::limit($item->content, 30) }}</th>
                    <th>{{ $item->module->title }}</th>
                    <th>
                        <div class="btn-group btn-group-sm" role="group">
                            <a href="{{ route('lessons.edit', $item->id) }}"
                               class="btn btn-outline-primary rounded">Editar</a>
                            <form action="{{ route('lessons.destroy', $item->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm ms-2">Eliminar</button>
                            </form>
                        </div>
                    </th>
                </tr>
            @endforeach
        </tbody>
    </table>




</x-app-layout>
