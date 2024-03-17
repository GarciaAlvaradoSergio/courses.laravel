@extends('layouts.app')

@section('content')
    <h3>Crear nuevo modulo</h3>
    <div class="row justify-content-center mt-4">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <form method="post" action="{{ route('modules.store') }}">
                        @csrf
                        <div class="mt-2 mb-3">
                            <input name="title" type="text" class="form-control" placeholder="{{ __('Agrega un título a tu modulo...') }}">
                        </div>
                        <div class="mb-3">
                            <textarea name="description" class="form-control" placeholder="{{ __('Coloca una descripción a tu modulo...') }}" rows="3"></textarea>
                        </div>
                        <div class="mt-2 mb-3">
                            <select id="course_id" name="course_id" class="form-control">
                                @foreach ($courses as $course)
                                    <option value="{{ $course->id }}" required>{{ $course->title }}</option>
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
@endsection
