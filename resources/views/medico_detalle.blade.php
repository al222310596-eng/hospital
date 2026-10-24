<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles del Médico</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        <br><br>
        <h3>Detalles del Médico</h3>
        <h5>ID: {{ $medico->id_medico }}</h5>
        <hr>
        <table class="table">
            <tbody>
                    <tr>
                    <th>Foto</th>
                    <td>
                    <img src="{{ url('/img/'.$medico->foto) }}" style="width: 200px;">
                    </td>
                </tr>
                    <th>Clave</th>
                    <td>{{ $medico->clave }}</td> <!-- Corregido: Cambiado de $hospital a $medico -->
                </tr>
                <tr>
                    <th>Nombre</th>
                    <td>{{ $medico->nombre }}</td> <!-- Corregido: Cambiado de $hospital a $medico -->
                </tr>
                <tr>
                    <th>Apellidos</th>
                    <td>{{ $medico->app }}</td> <!-- Agregado para mostrar los apellidos -->
                </tr>
                <tr>
                    <th>Fecha de Nacimiento</th>
                    <td>{{ $medico->fn }}</td> <!-- Agregado para mostrar la fecha de nacimiento -->
                </tr>
                <tr>
                    <th>Sexo</th>
                    <td>{{ $medico->sexo }}</td> <!-- Capitaliza el sexo -->
                </tr>
                <tr>
                    <th>Email</th>
                    <td>{{ $medico->email }}</td>
                </tr>
                <tr>
                    <th>Estatus</th>
                    <td>{{ $medico->activo ? 'Activo' : 'Inactivo' }}</td>
                </tr>
                <tr>
                    <th>Creado El</th>
                    <td>{{ $medico->created_at }}</td>
                </tr>
                <tr>
                    <th>Actualizado El</th>
                    <td>{{ $medico->updated_at }}</td>
                </tr>
            </tbody>
        </table>

        <a href="{{ route('medicos') }}">
            <button type="button" class="btn btn-primary">Volver a la lista de Médicos</button>
        </a>
    </div>
</body>
</html>
