<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo Registro de Hospitales</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container mt-5">
        <h3 class="mb-4">Nuevo Registro de Hospitales</h3>
        <h5 class="mb-3">CRUD: Hospitales -> Registro</h5>
        <hr>
        <form action="{{ route('hospital_registrar') }}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <h3 class="mt-4">Datos del Hospital</h3>

            <div class="form-floating mb-3">
                <input type="input" class="form-control" name="clave" value="{{ old('clave') }}" id="floatingclave"
                    placeholder="ejemplo: UTVT Atención Hospitalaria" aria-describedby="ClaveHelp" required>
                <label for="floatingclave">Clave</label>
                <div id="ClaveHelp" class="form-text">Coloque la clave</div>
                @if($errors->first('clave'))
                    <div class="text-danger">{{ $errors->first('clave') }}</div>
                @endif
            </div>

            <div class="form-floating mb-3">
                <input type="input" class="form-control" name="nombre" value="{{ old('nombre') }}" id="floatingNombre"
                    placeholder="ejemplo: UTVT Paramédicos" aria-describedby="NombreHelp" required>
                <label for="floatingNombre">Nombre</label>
                <div id="NombreHelp" class="form-text">@if($errors->first('nombre')) <i>El campo Nombre(s) no es correcto!!!</i>@endif</div>
            </div>

            <div class="input-group mb-3">
                <label class="input-group-text" for="activo">Estatus</label>
                <select class="form-select" id="activo" name="activo" required>
                    <option value="" disabled selected>Selecciona una opción...</option>
                    <option value="1">Activo</option>
                    <option value="0">Inactivo</option>
                </select>
            </div>

            <hr>

            <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-primary">Guardar</button>
                <a href="{{ route('hospitales') }}">
                    <button type="button" class="btn btn-danger">Cancelar</button>
                </a>
            </div>
        </form>
    </div>
</body>
</html>
