<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Pacientes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        <br><br>
        <h3>Editar Pacientes</h3>
        <h5>CRUD: Pacientes -> Editar</h5>
        <br>
        <img src="{{ url('img/'.$paciente->foto) }}" width="120px" style="border: 1px solid #000;border-radius: 5px;">
<form action="{{ route('paciente_salvar',['id' => $paciente->id_paciente]) }}" method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}
    {{ method_field('PUT') }}

        <h3>Datos</h3>
        <form action="{{ route('paciente_salvar', ['id' => $paciente->id_paciente]) }}" method="POST">
            @csrf <!-- Para el token CSRF -->
            <input type="hidden" name="_method" value="PUT"> 
            
            <!-- Campos de entrada para editar médico -->
            <div class="form-floating mb-3">
                <input type="input" class="form-control" name="clave" value="{{ $paciente->clave }}" id="floatingClave"
                    placeholder="ejemplo: UTVT paciente" aria-describedby="ClaveHelp">
                <label for="floatingClave">Clave</label>
            </div>
            <div class="form-floating mb-3">
                <input type="input" class="form-control" name="nombre" value="{{ $paciente->nombre }}" id="floatingNombre"
                    placeholder="ejemplo: Hugo" aria-describedby="NombreHelp">
                <label for="floatingNombre">Nombre</label>
            </div>
            <div class="form-floating mb-3">
                <input type="input" class="form-control" name="app" value="{{ $paciente->app }}" id="floatingApp"
                    placeholder="ejemplo: García" aria-describedby="AppHelp">
                <label for="floatingApp">Apellido Paterno</label>
            </div>
            <div class="form-floating mb-3">
                <input type="date" class="form-control" name="fn" value="{{ $paciente->fn }}" id="floatingFn"
                    placeholder="Fecha de Nacimiento">
                <label for="floatingFn">Fecha de Nacimiento</label>
            </div>
            <div class="input-group mb-3">
                <select class="form-select" id="sexo" name="sexo">
                    <option value="masculino" {{ $paciente->sexo === 'masculino' ? 'selected' : '' }}>Masculino</option>
                    <option value="femenino" {{ $paciente->sexo === 'femenino' ? 'selected' : '' }}>Femenino</option>
                </select>
                <label class="input-group-text" for="sexo">Sexo</label>
            </div>
            <div class="input-group mb-3">
                <select class="form-select" id="activo" name="activo">
                    <option value="1" {{ $paciente->activo ? 'selected' : '' }}>Activo</option>
                    <option value="0" {{ !$paciente->activo ? 'selected' : '' }}>Inactivo</option>
                </select>
                <label class="input-group-text" for="activo">Estatus</label>
            </div>
            <div class="form-floating mb-3">
        <input type="file" class="form-control" name="foto5" id="floatingfoto" placeholder="-----"
            aria-describedby="fotoHelp">
        <input type="hidden" name="foto4" value="{{ $paciente->foto }}">
        <label for="floatingfoto">Foto</label>
        <div id="fotoHelp" class="form-text">Busque una Imagen para su perfil (i.e: Formatos: jpg/png/bmp)</div>
    </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
            <a href="{{ route('pacientes') }}">
                <button type="button" class="btn btn-danger">Cancelar</button>
            </a>
            <a href="{{ route('pacientes') }}">
                <button type="button" class="btn btn-primary">Volver a la lista de Pacientes</button>
            </a>
        </form>

        <br><br><br>
    </div>         
</body>
</html>
