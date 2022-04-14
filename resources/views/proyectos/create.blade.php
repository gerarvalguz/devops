@extends('layouts.app')

@section('title', 'Administración de proyectos')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1>Nuevo Proyecto</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <form action="{{route('proyectos.store')}}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <label for="nombre" class="text-secondary font-weight-bold d-block @error('nombre') text-danger @enderror">
                            Nombre
                        </label>
                        <input type="text" id="nombre" name="nombre" value="{{old('nombre')}}" class="form-control border-0 shadow @error('nombre') is-invalid @enderror" placeholder="¿Cuál es el proyecto?">
                        @error('nombre')
                            <span class="d-block text-danger mt-2 font-weight-bold">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="" class="text-secondary font-weight-bold d-block @error('tipo_proyecto') text-danger @enderror">Tipo de proyecto</label>
                        <select name="tipo_proyecto" id="tipo_proyecto" value="{{old('tipo_proyecto')}}" class="form-control border-0 shadow @error('tipo_proyecto') is-invalid @enderror">
                            <option value="" selected disabled>Selecciona...</option>
                            <option value="1" {{ old('tipo_proyecto') == '1' ? 'selected' : '' }}>Personal</option>
                            <option value="2" {{ old('tipo_proyecto') == '2' ? 'selected' : '' }}>Negocios</option>
                            <option value="3" {{ old('tipo_proyecto') == '3' ? 'selected' : '' }}>Inversión</option>
                            <option value="4" {{ old('tipo_proyecto') == '4' ? 'selected' : '' }}>Innovación</option>
                        </select>
                        @error('tipo_proyecto')
                            <span class="d-block text-danger mt-2 font-weight-bold">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-12 mt-3">
                        <label for="descripcion" class="text-secondary font-weight-bold d-block @error('descripcion') text-danger @enderror">
                            Descripción
                        </label>
                        <textarea id="descripcion" name="descripcion" class="form-control border-0 shadow @error('descripcion') is-invalid @enderror" placeholder="Comentarios..." rows="5">{{ old('descripcion') }}</textarea>
                        @error('descripcion')
                            <span class="d-block text-danger mt-2 font-weight-bold">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <button type="submit" class="btn btn-dark mt-5">Guardar proyecto</button>
              
                
            </form>
        </div>
    </div>
@endsection