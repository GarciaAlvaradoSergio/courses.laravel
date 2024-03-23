<x-app-layout>

    <h3>Usuario {{ $user->name }}</h3>
    <hr />

    <div class="row justify-content-center text-center">
        <div class="col-md-5">
            <ul class="list-group list-group-flush">
                <li class="list-group-item">Correo: {{ $user->email }}</li>
                <li class="list-group-item">Creación de la cuenta: {{ $user->created_at->format('j M Y') }}</li>
                <li class="list-group-item">Nombre: {{ $user->name }}</li>
                <li class="list-group-item">Rol: Administrador</li>
                <li class="list-group-item"><a href="{{ route('users.index') }}" class="btn btn-success btn-sm"> Regresar</a></li>
            </ul>
        </div>
    </div>
</x-app-layout>
