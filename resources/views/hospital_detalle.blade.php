<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles del Hospital</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        <br><br>
        <h3>Detalles del Hospital</h3>
        <h5>ID: {{ $hospital->id_hospital }}</h5>
        <hr>
        <table class="table">
            <tbody>
                <tr>
                    <th>Clave</th>
                    <td>{{ $hospital->clave }}</td>
                </tr>
                <tr>
                    <th>Nombre</th>
                    <td>{{ $hospital->nombre }}</td>
                </tr>
                <tr>
                    <th>Estatus</th>
                    <td>{{ $hospital->activo ? 'Activo' : 'Inactivo' }}</td>
                </tr>
                <tr>
                    <th>Creado En</th>
                    <td>{{ $hospital->created_at }}</td>
                </tr>
                <tr>
                    <th>Actualizado En</th>
                    <td>{{ $hospital->updated_at }}</td>
                </tr>
            </tbody>
        </table>

        <a href="{{ route('hospitales') }}">
            <button type="button" class="btn btn-primary">Volver a la lista de Hospitales</button>
        </a>
    </div>
</body>
</html>
