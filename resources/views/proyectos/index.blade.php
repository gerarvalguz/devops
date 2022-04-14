@extends('layouts.app')

@section('title', 'Administración de proyectos')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1>Proyectos</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <a class="btn btn-dark" href="{{route('proyectos.create')}}">Nuevo proyecto</a>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-md-4">
            <table class="table">
                <thead class="thead-dark">
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Descripcion</th>
                </thead>
                
                @foreach ($query as $val)                    
                    <tr>
                        <td>
                            {{ $val->id }}
                        </td>
                        <td>
                            {{ $val->nombre }}
                        </td>
                        <td>
                            {{ $val->descripcion }}
                        </td>
                    </tr>
                @endforeach                    
            </table>
            {{ $query->links() }}
            
        </div>
    </div>
@endsection