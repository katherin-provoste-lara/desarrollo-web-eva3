@extends('layouts.app')

@section('title', 'Inicio de Sesión')

@section('content')

    ```
    <div class="formulario">

        <!-- Encabezado del formulario -->
        <div class="encabezado">
            <div class="icono">🔐</div>

            <h1>Inicio de Sesión</h1>

            <p>Ingresa tus datos para acceder al sistema.</p>
        </div>

        <!--
                Formulario de inicio de sesión.
                La ruta que procesará los datos será agregada
                posteriormente por el controlador.
            -->
        <form method="POST" action="{{ route('login') }}">
            @csrf

            @if ($errors->any())
                <div class="alert alert-danger" style="margin-bottom: 20px; color: #dc2626; font-size: 14px;">
                    <ul style="margin: 0; padding-left: 18px;">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Campo para ingresar el correo -->
            <div class="campo">
                <label for="email">Correo electrónico</label>

                <input type="email" id="email" name="email" value="{{ old('email') }}"
                    placeholder="ejemplo@correo.com" required>
            </div>

            <!-- Campo para ingresar la clave -->
            <div class="campo">
                <label for="password">Clave</label>

                <div class="campo-clave">
                    <input type="password" id="password" name="password" placeholder="Ingresa tu clave" required>

                    <button type="button" class="mostrar-clave" onclick="mostrarClave()"
                        aria-label="Mostrar u ocultar clave">
                        👁
                    </button>
                </div>
            </div>

            <button type="submit" class="boton">
                Iniciar Sesión
            </button>
        </form>

        <!-- Enlace hacia el registro -->
        <div class="enlace">
            <p>
                ¿No tienes una cuenta?
                <a href="{{ route('register') }}">Regístrate aquí</a>
            </p>
        </div>

    </div>

    <style>
        /*
             * Contenedor principal del formulario.
             */
        .formulario {
            width: 100%;
            max-width: 430px;
            padding: 35px;
            background-color: white;
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.10);
        }

        /*
             * Encabezado del formulario.
             */
        .encabezado {
            text-align: center;
            margin-bottom: 30px;
        }

        .icono {
            width: 55px;
            height: 55px;
            margin: 0 auto 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #dbeafe;
            border-radius: 50%;
            font-size: 25px;
        }

        .encabezado h1 {
            margin: 0 0 8px;
            font-size: 27px;
            color: #1e293b;
        }

        .encabezado p {
            margin: 0;
            color: #64748b;
            font-size: 14px;
        }

        /*
             * Cada grupo de campo del formulario.
             */
        .campo {
            margin-bottom: 20px;
        }

        .campo label {
            display: block;
            margin-bottom: 7px;
            font-weight: bold;
            font-size: 14px;
            color: #334155;
        }

        /*
             * Campos de entrada.
             */
        .campo input {
            width: 100%;
            padding: 12px 14px;
            border: 1px solid #cbd5e1;
            border-radius: 8px;
            font-size: 15px;
            outline: none;
            transition: border-color 0.2s, box-shadow 0.2s;
        }

        /*
             * Efecto visual cuando el usuario
             * selecciona un campo.
             */
        .campo input:focus {
            border-color: #2563eb;
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.12);
        }

        /*
             * Contenedor del campo de clave.
             */
        .campo-clave {
            position: relative;
        }

        .campo-clave input {
            padding-right: 48px;
        }

        /*
             * Botón para mostrar u ocultar la clave.
             */
        .mostrar-clave {
            position: absolute;
            right: 8px;
            top: 50%;
            transform: translateY(-50%);
            border: none;
            background: transparent;
            cursor: pointer;
            font-size: 17px;
        }

        /*
             * Botón principal.
             */
        .boton {
            width: 100%;
            padding: 13px;
            border: none;
            border-radius: 8px;
            background-color: #2563eb;
            color: white;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.2s, transform 0.2s;
        }

        .boton:hover {
            background-color: #1d4ed8;
            transform: translateY(-1px);
        }

        /*
             * Enlace de registro.
             */
        .enlace {
            margin-top: 22px;
            text-align: center;
        }

        .enlace p {
            margin: 0;
            color: #64748b;
            font-size: 14px;
        }

        .enlace a {
            color: #2563eb;
            font-weight: bold;
            text-decoration: none;
        }

        .enlace a:hover {
            text-decoration: underline;
        }

        /*
             * Adaptación para celulares.
             */
        @media (max-width: 500px) {
            .formulario {
                padding: 25px 20px;
            }

            .encabezado h1 {
                font-size: 24px;
            }
        }
    </style>

    <script>
        /*
         * Muestra u oculta la clave ingresada.
         */
        function mostrarClave() {
            const campo = document.getElementById('password'); // antes decía 'clave'

            if (campo.type === 'password') {
                campo.type = 'text';
            } else {
                campo.type = 'password';
            }
        }
    </script>
    ```

@endsection
