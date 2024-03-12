@extends('layouts.app')

@section('content')
    <form action="{{ route('courses.update', $course->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-7">
                    <div class="card">
                        <div class="card-header text-center">
                            Editar Tarea
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="title" class="form-label">Título</label>
                                <input type="text" class="form-control" id="title" name="title"
                                    value="{{ $course->title }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Descripción</label>
                                <textarea class="form-control" id="description" name="description" rows="3">{{ $course->description }}</textarea>
                            </div>
                           
                             <div class="row mb-3">
                            <div class="col">
                                <label for="inputCity" class="form-label">Fecha de inicio</label>
                                <input name="fInicio" type="date" class="form-control" placeholder="First name" aria-label="First name" value="{{ $course->fInicio}}">
                            </div>
                            <div class="col">
                                <label for="inputCity" class="form-label">Fecha de terminación</label>
                                <input name="fFinal" value="{{ $course->fFinal" type="date" class="form-control" placeholder="Last name" aria-label="Last name">
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-grid gap-2 col-6 mx-auto py-5">
            <button type="submit" class="btn btn-primary">Actualizar Tarea</button>
        </div>
    </form>
@endsection