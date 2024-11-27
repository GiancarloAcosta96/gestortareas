<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Tareas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-5">
        <h1 class="mb-4">Tareas</h1>
        <a href="{{ url('/tareas/create') }}" class="btn btn-success mb-3">Crear Tarea</a>
        <form action="{{ route('login') }}" method="POST" style="display: inline;">
            @csrf
            <button type="submit" class="btn btn-danger btn-sm">Cerrar sesión</button>
        </form>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>DNI</th>
                    <th>Título</th>
                    <th>Descripción</th>
                    <th>Fecha de Vencimiento</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tareas as $tarea)
                <tr>
                    <td>{{ $tarea->dni }}</td>
                    <td>{{ $tarea->titulo }}</td>
                    <td>{{ $tarea->descripcion }}</td>
                    <td>{{ $tarea->fecha_vencimiento }}</td>
                    <td>{{ $tarea->estado->nombre }}</td>
                    <td>
                        <a href="{{ url('/tareas/'.$tarea->id.'/edit') }}" class="btn btn-primary btn-sm">Editar</a>

                        <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modalEliminar"
                            data-tarea-id="{{ $tarea->id }}">Eliminar</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="modal fade" id="modalEliminar" tabindex="-1" aria-labelledby="modalEliminarLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalEliminarLabel">Eliminar Tarea</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    ¿Estás seguro de que deseas eliminar esta tarea?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <form id="formEliminar" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>


    <script>
        var modal = document.getElementById('modalEliminar');
        modal.addEventListener('show.bs.modal', function(event) {
            var button = event.relatedTarget;
            var tareaId = button.getAttribute('data-tarea-id');


            var form = document.getElementById('formEliminar');
            form.action = '/tareas/' + tareaId;
        });
    </script>
</body>

</html>