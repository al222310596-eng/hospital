<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hospitales Editar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
<br><br>
<br>
<h3>Editar Hospitales</h3>
<h5> CRUD: Hospitales -> Editar</h5>
<br>
    <h3>Datos</h3>
    <form action="{{ route('hospital_salvar', ['id' => $hospital->id_hospital]) }}" method="POST">
    @csrf <!-- Para el token CSRF -->
    <input type="hidden" name="_method" value="PUT"> <!-- Campo oculto para indicar PUT -->
    
    <!-- Tus campos de entrada aquí -->
    <div class="form-floating mb-3">
        <input type="input" class="form-control" name="clave" value="{{ $hospital->clave }}" id="floatingclave"
            placeholder="ejemplo: UTVT Atencion Hospitalaria" aria-describedby="ClaveHelp">
        <label for="floatingclave">Clave</label>
    </div>
    <div class="form-floating mb-3">
        <input type="input" class="form-control" name="nombre" value="{{ $hospital->nombre }}" id="floatingNombre"
            placeholder="ejemplo: UTVT Paramedicos" aria-describedby="NombreHelp">
        <label for="floatingNombre">Nombre</label>
    </div>
    <div class="input-group mb-3">
        <select class="form-select" id="activo" name="activo">
            <option value="1" {{ $hospital->activo ? 'selected' : '' }}>Activo</option>
            <option value="0" {{ !$hospital->activo ? 'selected' : '' }}>Inactivo</option>
        </select>
        <label class="input-group-text" for="activo">Estatus</label>
    </div>

    <button type="submit" class="btn btn-primary">Guardar</button>
    <a href="{{ route('hospitales') }}">
        <button type="button" class="btn btn-danger">Cancelar</button>
    </a>
    <a href="{{ route('hospitales') }}">
            <button type="button" class="btn btn-primary">Volver a la lista de Hospitales</button>
        </a>
</form>

<br><br><br>
</div>         
</body>
</html>



