@extends('adminView.layout.layout')

    @if(isset($libro))
        @section('title','Editar Libro')
    @else
        @section('title','Crear Libro')
    @endif
@section('content')
    <h1>{{ isset($libro) ? 'Editar Libro' : 'Crear Libro' }}</h1>
    <form class="me-4" method="POST" action="{{ isset($libro) ? route('libros.update', $libro->id) : route('libros.store') }}" enctype="multipart/form-data">
        @csrf
        @if(isset($libro))
            @method('PUT')
        @endif

        <div class="mb-2">
            <label for="titulo" class="form-label">Título</label>
            <input type="text" class="form-control" id="titulo" name="titulo" value="{{ isset($libro) ? $libro->titulo : "" }}">
        </div>

        <div class="mb-2">
            <label for="description" class="form-label">Descripción</label>
            <textarea class="form-control" id="description" name="descripcion" rows="4">{{ isset($libro) ? $libro->descripcion : "" }}</textarea>
        </div> 

        <div class="mb-2 d-flex flex-column">
            <label for="image" class="form-label">Imagen</label>
            @if(isset($libro) && $libro->urlImagen)
                <img src="{{ $libro->urlImagen }}" alt="Libro Image" class="my-1 maxSize300">
            @endif
            <input type="file" class="form-control-file" id="urlImage" name="urlImagen">
        </div>

        <div class="mb-2">
            <div class="col-md-6 mr-5">
                <div class="mb-3">
                    <label for="cantPag" class="form-label">Cantidad de Páginas</label>
                    <input type="number" class="form-control" id="cantPag" name="cantidadPaginas" value="{{ isset($libro) ? $libro->cantidadPaginas : "" }}">
                </div>
            </div>
            <div class="col-md-6 ml-5">
                <div class="mb-3">
                    <label for="price" class="form-label">Precio</label>
                    <input type="number" step="0.01" class="form-control" id="price" name="precio" value="{{ isset($libro) ? $libro->precio : "" }}">
                </div>
            </div>
        </div>

    <div class="form-check">
        <input type="hidden" name="disponible" value="0" />
        <label class="form-check-label" for="disponible">Disponible</label>
        <input class="form-check-input" type="checkbox" name="disponible" value="1" {{isset($libro) && $libro->disponible || !isset($libro) ? 'checked' : '' }}>
    </div>

        <div class="mb-3 row">
            <label for="autor" class="form-label">Autores</label>
            <select class="selectAutores p-0" name="autores[]" multiple="multiple">
                @foreach ($autores as $autor)
                <option value="{{ $autor->id }}" {{isset($libro) && $libro->autores->contains('id', $autor->id) ? 'selected' : '' }} >
                    {{ $autor->nombre }} {{ $autor->apellido }}
                </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3 row">
            <label for="autor" class="form-label">Generos</label>
            <select class="selectGeneros" name="generos[]" multiple="multiple">
                @foreach ($generos as $genero)
                <option value="{{ $genero->id }}" {{isset($libro) && $libro->generos->contains('id', $genero->id) ? 'selected' : '' }} >
                    {{ $genero->nombreGenero }}
                </option>
                @endforeach
            </select>
        </div>


        <div class="d-grid my-3">
                <button type="submit" class="btn btn-primary">{{ isset($libro) ? 'Actualizar' : 'Guardar' }}</button>
        </div>
    </form>

@endsection
