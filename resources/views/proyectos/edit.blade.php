<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Editar Proyecto</title>


    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
        }


        .contenedor {

            width: 500px;
            margin: auto;
            border: 1px solid #ccc;
            padding: 20px;
            border-radius: 10px;

        }


        h1 {

            text-align: center;

        }


        label {

            display: block;
            margin-top: 15px;
            font-weight: bold;

        }


        input {

            width: 100%;
            padding: 8px;
            margin-top: 5px;

        }


        button {

            margin-top: 20px;
            padding: 10px 20px;
            cursor: pointer;

        }
    </style>


</head>

<!-- Esta vista permite modificar los datos de un proyecto existente.
Muestra la información actual para poder actualizarla. -->

<body>


    <div class="contenedor">


        <h1>Editar Proyecto</h1>

        @if ($errors->any())
            <div style="background: #fee2e2; color: #dc2626; padding: 12px; margin-bottom: 15px; border-radius: 6px;">
                <ul style="margin: 0; padding-left: 18px;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form id="form-update" action="{{ route('proyectos.update', $proyecto->id) }}" method="POST">

            @csrf

            @method('PUT')


            <label>
                Nombre:
            </label>

            <input type="text" name="nombre" value="{{ $proyecto->nombre }}">



            <label>
                Fecha Inicio:
            </label>

            <input type="date" name="fecha_inicio" value="{{ $proyecto->fecha_inicio->format('Y-m-d') }}">



            <label>Estado:</label>
            <select name="estado" required>
                <option value="pendiente" {{ $proyecto->estado === 'pendiente' ? 'selected' : '' }}>Pendiente</option>
                <option value="en progreso" {{ $proyecto->estado === 'en progreso' ? 'selected' : '' }}>En progreso
                </option>
                <option value="completado" {{ $proyecto->estado === 'completado' ? 'selected' : '' }}>Completado
                </option>
            </select>


            <label>
                Responsable:
            </label>

            <input type="text" name="responsable" value="{{ $proyecto->responsable }}">



            <label>
                Monto:
            </label>

            <input type="number" name="monto" value="{{ $proyecto->monto }}">



            <button type="submit">

                Actualizar Proyecto

            </button>



        </form>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                document.getElementById('form-update').addEventListener('submit', async function(e) {
                    e.preventDefault();

                    const response = await fetch(this.action, {
                        method: 'POST',
                        body: new FormData(this),
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest'
                        }
                    });

                    if (response.status === 200) {
                        window.location.href = "{{ route('proyectos.show', $proyecto->id) }}";
                    }
                });
            });
        </script>

    </div>


</body>


</html>
