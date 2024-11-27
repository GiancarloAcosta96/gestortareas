<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Tarea</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-5">
        <h1 class="mb-4">Editar Tarea</h1>
        <a href="{{ route('tareas.index') }}" class="btn btn-secondary">Volver a la lista de tareas</a>

        <form action="{{ route('tareas.update', $tarea->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="dni" class="form-label">DNI:</label>
                <input type="text" id="dni" name="dni" class="form-control" value="{{ old('dni', $tarea->dni) }}"
                    required>
            </div>

            <div class="mb-3">
                <label for="titulo" class="form-label">Título:</label>
                <input type="text" id="titulo" name="titulo" class="form-control"
                    value="{{ old('titulo', $tarea->titulo) }}" required>
            </div>

            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción:</label>
                <textarea id="descripcion" name="descripcion" class="form-control"
                    required>{{ old('descripcion', $tarea->descripcion) }}</textarea>
            </div>

            <div class="mb-3">
                <label for="fecha_vencimiento" class="form-label">Fecha de Vencimiento:</label>
                <input type="date" id="fecha_vencimiento" name="fecha_vencimiento" class="form-control"
                    value="{{ old('fecha_vencimiento', $tarea->fecha_vencimiento) }}" required>
            </div>

            <div class="mb-3">
                <label for="estado" class="form-label">Estado:</label>
                <select name="estado_id" id="estado_id" class="form-control" required>
                    @foreach ($estados as $estado)
                    <option value="{{ $estado->id }}"
                        {{ old('estado_id', $tarea->estado_id) == $estado->id ? 'selected' : '' }}>
                        {{ $estado->nombre }}
                    </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Actualizar Tarea</button>
            </div>
        </form>


    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pzjw8f+ua7Kw1TIq0Hq4fP4N+LsgA0vBrt8xtgIuLaNJNoGa9hYBQfLtO8mpuB7p" crossorigin="anonymous">
    </script>
</body>

</html>