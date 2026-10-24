<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hospital - Atención Médica</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        body {
    background-color: #fff; /* Fondo blanco */
    color: #000; /* Color de texto negro */
}

.navbar-dark {
    background-color: #fff; /* Blanco para el fondo del menú */
}

.navbar-dark .navbar-nav .nav-link {
    color: #fff; /* Color negro para los enlaces */
}

.table thead th {
    background-color: #fff; /* Blanco para la cabecera de la tabla */
    color: #000; /* Texto negro en la cabecera */
    border-bottom: 2px solid #000; /* Borde negro en la cabecera */
}

.table tbody td {
    background-color: #f8f9fa; /* Fondo gris claro para las celdas */
    color: #000; /* Texto negro en las filas */
}

.btn-primary {
    background-color: #0d6efd; /* Negro para los botones */
    border-color: #0d6efd; /* Bordes del botón negro */
    color: #fff; /* Texto blanco en los botones */
}

.btn-danger {
    background-color: #dc3545; /* Rojo para el botón de borrar */
    border-color: #dc3545; /* Bordes del botón de borrar */
    color: #fff; /* Texto blanco en el botón de borrar */
}

    </style>
</head>
<body>

    <!-- Menú de Navegación -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Hospital</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Atención</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('hospitales') }}">Hospitales</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('medicos') }}">Médicos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('pacientes') }}">Pacientes</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <h3 class="text-center">Registrar Atención</h3>
        <form action="{{ route('atencion_registrar') }}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}

            <!-- Selección de Hospital -->
            <div class="mb-3">
                <label for="id_hospital" class="form-label">Hospital</label>
                <select class="form-select" id="id_hospital" name="id_hospital">
                    <option selected>Selecciona un Hospital</option>
                    @foreach($hospitales as $hospital)
                        <option value="{{ $hospital->id_hospital }}">{{ $hospital->nombre }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Selección de Médico -->
            <div class="mb-3">
                <label for="id_medico" class="form-label">Médico</label>
                <select class="form-select" id="id_medico" name="id_medico">
                    <option selected>Selecciona un Médico</option>
                    @foreach($medicos as $medico)
                        <option value="{{ $medico->id_medico }}">{{ $medico->nombre }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Selección de Paciente -->
            <div class="mb-3">
                <label for="id_paciente" class="form-label">Paciente</label>
                <select class="form-select" id="id_paciente" name="id_paciente">
                    <option selected>Selecciona un Paciente</option>
                    @foreach($pacientes as $paciente)
                        <option value="{{ $paciente->id_paciente }}">{{ $paciente->nombre }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Detalles de la Atención -->
            <div class="mb-3">
                <label for="detalle" class="form-label">Detalles</label>
                <input type="text" class="form-control" id="detalle" name="detalle" placeholder="Descripción breve de la atención">
            </div>

            <!-- Botón de envío -->
            <button type="submit" class="btn btn-primary">Registrar Atención</button>
        </form>

        <hr class="mt-5">

        <h3 class="text-center">Lista de Atenciones</h3>
        <table class="table table-dark table-bordered mt-3">
            <thead>
                <tr>
                    <th>ID Atención</th>
                    <th>Hospital</th>
                    <th>Médico</th>
                    <th>Paciente</th>
                    <th>Detalles</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($atenciones as $atencion)
                <tr>
                    <td>{{ $atencion->id_atencion }}</td>
                    <!-- Mostrar nombres en lugar de IDs -->
                    <td>{{ $atencion->hospital->nombre }}</td>
                    <td>{{ $atencion->medico->nombre }}</td>
                    <td>{{ $atencion->paciente->nombre }}</td>
                    <td>{{ $atencion->detalle }}</td>
                    <td>
                    <a href="{{ route('atencion_borrar', ['id' => $atencion->id_atencion]) }}" class="btn btn-danger btn-sm" onclick="return confirm('¿Seguro que deseas eliminar esta atención?')">Borrar</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- JavaScript de Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
