<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Hospitales</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}" crossorigin="anonymous"></script>
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
                        <a class="nav-link" href="{{ route('atenciones') }}">Atención</a>
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

    <div class="container">
        <br><br>
        <h3>Hospitales</h3>
        <h5>CRUD: Hospitales</h5>
        <hr>
        <p style="text-align: right;">
            <a href="{{ route('hospital_alta') }}">
                <button type="button" class="btn btn-primary btn-sm">Nuevo Registro Hospitales</button>
            </a>
        </p>
        <hr><br>
        <table class="table">
            <thead>
                <tr>
                    <th>id_hospital</th>
                    <th>clave</th>
                    <th>nombre</th>
                    <th>Estatus</th> 
                    <th>acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($hospitales as $hospital)
                <tr>
                    <td>{{ $hospital->id_hospital }}</td> <!-- Corregido: $hospital en lugar de $hospitales -->
                    <td>{{ $hospital->clave }}</td>
                    <td>{{ $hospital->nombre }}</td>
                    <td>{{ $hospital->activo }}</td>
                    <td>
                        <a href="{{ route('hospital_detalle', ['id' => $hospital->id_hospital]) }}">
                            <button type="button" class="btn btn-success btn-sm">
                                <i class="fas fa-eye"></i> Detalle
                            </button> 
                        </a>
                        <a href="{{ route('hospital_editar', ['id' => $hospital->id_hospital]) }}">
                            <button type="button" class="btn btn-warning btn-sm"> <!-- btn-sm corregido -->
                                <i class="fas fa-pencil-alt"></i> Editar
                            </button> 
                        </a>
                        <a href="{{ route('hospital_borrar', ['id' => $hospital->id_hospital]) }}">
                            <button type="button" class="btn btn-danger btn-sm">
                                <i class="fas fa-trash"></i> Borrar
                            </button> 
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>