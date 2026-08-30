<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Crear Proyecto</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
        }

        h1 {
            text-align: center;
        }

        form {
            width: 50%;
            margin: auto;
        }

        label {
            font-weight: bold;
        }

        input,
        select {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            margin-bottom: 15px;
        }

        button {
            padding: 10px 20px;
            cursor: pointer;
        }
    </style>
</head>

<!-- Esta vista contiene el formulario para ingresar un nuevo proyecto.
Los datos ingresados son enviados al controlador para ser procesados. -->

<body>

    <h1>Crear Nuevo Proyecto</h1>

    <form action="{{ route('proyectos.store') }}" method="POST">

        @csrf

        <label for="nombre">
            Nombre del proyecto:
        </label>

        <input
            type="text"
            id="nombre"
            name="nombre"
            placeholder="Ingrese nombre del proyecto"
            required
        >

        <label for="fecha_inicio">
            Fecha de inicio:
        </label>

        <input
            type="date"
            id="fecha_inicio"
            name="fecha_inicio"
            required
        >

        <label for="estado">
            Estado:
        </label>

        <select
            id="estado"
            name="estado"
            required
        >

            <option value="pendiente">
                Pendiente
            </option>

            <option value="en progreso">
                En progreso
            </option>

            <option value="completado">
                Completado
            </option>

        </select>

        <label for="responsable">
            Responsable:
        </label>

        <input
            type="text"
            id="responsable"
            name="responsable"
            placeholder="Ingrese responsable"
            required
        >

        <label for="monto">
            Monto:
        </label>

        <input
            type="number"
            id="monto"
            name="monto"
            placeholder="Ingrese monto"
            required
        >

        <button type="submit">
            Guardar Proyecto
        </button>

    </form>

</body>

</html>
