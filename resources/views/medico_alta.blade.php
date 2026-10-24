<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo Registro de Médicos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container mt-5">
        <h3 class="mb-4">Nuevo Registro de Medicos</h3>
        <h5 class="mb-3">CRUD: Médicos -> Registro</h5>
        <hr>
        <form action="{{ route('medico_registrar') }}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <h3 class="mt-4">Datos del Médico</h3>

            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="clave" value="{{ old('clave') }}" id="floatingClave"
                    placeholder="ejemplo: MD123" required>
                <label for="floatingClave">Clave</label>
                @if($errors->first('clave'))
                    <div class="text-danger">{{ $errors->first('clave') }}</div>
                @endif
            </div>

            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="nombre" value="{{ old('nombre') }}" id="floatingNombre"
                    placeholder="Nombre del Médico" required>
                <label for="floatingNombre">Nombre</label>
                @if($errors->first('nombre'))
                    <div class="text-danger">{{ $errors->first('nombre') }}</div>
                @endif
            </div>

            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="app" value="{{ old('app') }}" id="floatingApp"
                    placeholder="Apellido del Médico" required>
                <label for="floatingApp">Apellido</label>
                @if($errors->first('app'))
                    <div class="text-danger">{{ $errors->first('app') }}</div>
                @endif
            </div>

            <div class="form-floating mb-3">
                <input type="date" class="form-control" name="fn" value="{{ old('fn') }}" id="floatingFn" required>
                <label for="floatingFn">Fecha de Nacimiento</label>
            </div>

            <div class="mb-3">
                <label for="sexo" class="form-label">Sexo</label>
                <select class="form-select" id="sexo" name="sexo" required>
                    <option value="" disabled selected>Selecciona una opción...</option>
                    <option value="masculino">Masculino</option>
                    <option value="femenino">Femenino</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="foto" class="form-label">Foto</label>
                <input type="file" class="form-control" id="foto" name="foto" accept="image/*" required>
            </div>

            <div class="form-floating mb-3">
                <input type="email" class="form-control" name="email" value="{{ old('email') }}" id="floatingEmail"
                    placeholder="email@example.com" required>
                <label for="floatingEmail">Correo Electrónico</label>
                @if($errors->first('email'))
                    <div class="text-danger">{{ $errors->first('email') }}</div>
                @endif
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
                <a href="{{ route('medicos') }}">
                    <button type="button" class="btn btn-danger">Cancelar</button>
                </a>
            </div>
        </form>
    </div>
</body>
</html>
