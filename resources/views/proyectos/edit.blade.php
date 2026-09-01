<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Editar Proyecto</title>


    <style>
        body {
            font-family: 'Segoe UI', Arial, sans-serif;
            margin: 0;
            background: #f4f6f8;
            color: #1f2937;
        }

        .contenedor {
            width: 100%;
            max-width: 650px;
            margin: 20px auto;
            padding: 30px;
            background: white;
            border: 1px solid #e5e7eb;
            border-radius: 14px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
        }

        h1 {
            margin: 0 0 25px;
            text-align: center;
            color: #1e3a8a;
            font-size: 26px;
        }

        label {
            display: block;
            margin-top: 18px;
            margin-bottom: 7px;
            font-weight: bold;
            color: #1f2937;
        }

        input,
        select {
            width: 100%;
            padding: 12px;
            margin-top: 0;
            border: 1px solid #d1d5db;
            border-radius: 7px;
            font-size: 15px;
            background: #f9fafb;
            color: #1f2937;
            outline: none;
        }

        input:focus,
        select:focus {
            border-color: #2563eb;
            background: white;
            box-shadow: 0 0 0 2px rgba(37, 99, 235, 0.1);
        }

        button {
            display: block;
            width: 100%;
            margin-top: 25px;
            padding: 12px 20px;
            border: none;
            border-radius: 7px;
            background: #2563eb;
            color: white;
            font-size: 15px;
            font-weight: bold;
            cursor: pointer;
            transition: background 0.2s ease;
        }

        button:hover {
            background: #1d4ed8;
        }

        @media (max-width: 600px) {
            .contenedor {
                margin: 10px auto;
                padding: 25px 20px;
            }

            h1 {
                font-size: 22px;
            }
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
