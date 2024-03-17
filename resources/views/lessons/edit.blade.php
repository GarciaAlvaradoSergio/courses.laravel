<x-app-layout>

    <h3>Crear nueva lección</h3>
    <div class="row justify-content-center mt-4">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <form method="post" action="{{ route('lessons.update', $lesson) }}">
                        @csrf
                        @method('patch')
                        <div class="mt-2 mb-3">
                            <input name="title" type="text" class="form-control" value={{ old('title', $lesson->title) }}>
                        </div>
                        <div class="mb-3">
                            <textarea name="description" class="form-control" placeholder="{{ __('Coloca una descripción a tu lección...') }}" rows="3"></textarea>
                        </div>
                        <div class="mb-3">
                            <textarea name="content" class="form-control" placeholder="{{ _('Coloca el contenido a tu lección...') }}" rows="3"></textarea>
                        </div>

                        <div class="mt-2 mb-3">
                            <select id="module_id" name="module_id" class="form-control">
                                @foreach ($modules as $module)
                                    <option value="{{ $module->id }}" required>{{ $module->title }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="d-grid gap-2">
                            <button class="btn btn-success" type="submit">Agregar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
