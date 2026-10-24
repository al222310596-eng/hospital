<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles del paciente</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        <br><br>
        <h3>Detalles del paciente</h3>
        <h5>ID: {{ $paciente->id_paciente }}</h5>
        <hr>
        <table class="table">
            <tbody>
                    <tr>
                    <th>Foto</th>
                    <td>
                    <img src="{{ url('/img/'.$paciente->foto) }}" style="width: 200px;">
                    </td>
                </tr>
                    <th>Clave</th>
                    <td>{{ $paciente->clave }}</td> <!-- Corregido: Cambiado de $hospital a $medico -->
                </tr>
                <tr>
                    <th>Nombre</th>
                    <td>{{ $paciente->nombre }}</td> <!-- Corregido: Cambiado de $hospital a $medico -->
                </tr>
                <tr>
                    <th>Apellidos</th>
                    <td>{{ $paciente->app }}</td> <!-- Agregado para mostrar los apellidos -->
                </tr>
                <tr>
                    <th>Fecha de Nacimiento</th>
                    <td>{{ $paciente->fn }}</td> <!-- Agregado para mostrar la fecha de nacimiento -->
                </tr>
                <tr>
                    <th>Sexo</th>
                    <td>{{ $paciente->sexo }}</td> <!-- Capitaliza el sexo -->
                </tr>
                <tr>
                    <th>Estatus</th>
                    <td>{{ $paciente->activo ? 'Activo' : 'Inactivo' }}</td>
                </tr>
                <tr>
                    <th>Creado El</th>
                    <td>{{ $paciente->created_at }}</td>
                </tr>
                <tr>
                    <th>Actualizado El</th>
                    <td>{{ $paciente->updated_at }}</td>
                </tr>
            </tbody>
        </table>

        <a href="{{ route('pacientes') }}">
            <button type="button" class="btn btn-primary">Volver a la lista de Pacientes</button>
        </a>
    </div>
</body>
</html>
