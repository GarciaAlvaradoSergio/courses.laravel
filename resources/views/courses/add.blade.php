@extends('layouts.app')

@section('content')
    <h3>Crear nuevo curso</h3>
    <div class="row justify-content-center mt-4">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <form method="post" action="{{ route('courses.store') }}">
                        @csrf
                        <div class="mt-2 mb-3">
                            <input name="title" type="text" class="form-control" id="exampleFormControlInput1" placeholder="{{ __('Agrega un título a tu curso...') }}">
                        </div>
                        <div class="mb-3">
                            <textarea name="description" class="form-control" id="exampleFormControlTextarea1" placeholder="{{ __('Coloca una descripción a tu curso...') }}" rows="3"></textarea>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <label for="inputCity" class="form-label">Fecha de inicio</label>
                                <input name="fInicio" type="date" class="form-control" placeholder="First name" aria-label="First name">
                            </div>
                            <div class="col">
                                <label for="inputCity" class="form-label">Fecha de terminación</label>
                                <input name="fFinal" type="date" class="form-control" placeholder="Last name" aria-label="Last name">
                            </div>
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
