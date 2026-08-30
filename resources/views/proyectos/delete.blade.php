<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Eliminar Proyecto</title><!--Vista para eliminar proyecto por su id -->


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
            text-align: center;

        }


        h1 {

            color: red;

        }


        p {

            font-size: 18px;

        }


        button,
        a {

            padding: 10px 20px;
            margin: 10px;
            text-decoration: none;
            border: none;
            cursor: pointer;

        }


        .eliminar {

            background-color: #ffcccc;

        }


        .cancelar {

            background-color: #eeeeee;

        }
    </style>


</head>
<!--Esta vista permite confirmar la eliminación de un proyecto específico.
Muestra la información del proyecto seleccionado antes de eliminarlo.-->

<body>


    <div class="contenedor">


        <h1>
            Eliminar Proyecto
        </h1>


        <p>
            ¿Está seguro que desea eliminar este proyecto?
        </p>



        <p>

            <strong>ID:</strong>

            {{ $proyecto->id }}

        </p>



        <p>

            <strong>Nombre:</strong>

            {{ $proyecto->nombre }}

        </p>



        <p>

            <strong>Estado:</strong>

            {{ $proyecto->estado }}

        </p>



        <form id="form-eliminar" action="{{ route('proyectos.destroy', $proyecto) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit">Sí, eliminar</button>
        </form>

        <a href="{{ route('proyectos.index') }}">Cancelar</a>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                document.getElementById('form-eliminar').addEventListener('submit', async function(e) {
                    e.preventDefault();

                    const response = await fetch(this.action, {
                        method: 'POST',
                        body: new FormData(this),
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest'
                        }
                    });

                    if (response.status === 204) {
                        window.location.href = "{{ route('proyectos.index') }}";
                    } else {
                        const data = await response.json();
                        alert(data.message);
                    }
                });
            });
        </script>

    </div>


</body>


</html>
