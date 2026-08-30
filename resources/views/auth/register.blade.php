@extends('layouts.app')

@section('title', 'Registro de Usuario')

@section('content')

    <div class="auth-card">

        ```
        <div class="auth-header">
            <h1>Crear cuenta</h1>
            <p>Regístrate para comenzar a gestionar tus proyectos.</p>
        </div>

        <form method="POST"
            action="{{ route('register') }}">

    @csrf

    <!-- Campo para ingresar el nombre -->
    <div class="form-group">
            <label for="name">Nombre</label>

            <input type="text" id="name" name="name" placeholder="Ingresa tu nombre" required>
    </div>

    <!-- Campo para ingresar el correo -->
    <div class="form-group">
        <label for="email">Correo electrónico</label>

        <input type="email" id="email" name="email" placeholder="ejemplo@correo.com" required>
    </div>

    <!-- Campo para ingresar la clave -->
    <div class="form-group">
        <label for="password">Contraseña</label>

        <input type="password" id="password" name="password" placeholder="Ingresa tu contraseña" required>
    </div>

    <div class="form-group">
        <label for="password_confirmation" class="form-label">
            Confirmar contraseña
        </label>

        <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required>
    </div>


    <!-- Botón de registro -->
    <button type="submit" class="btn-principal">
        Crear cuenta
    </button>

    </form>

    <!-- Enlace al inicio de sesión -->
    <div class="auth-footer">
        <p>
            ¿Ya tienes una cuenta?
            <a href="/login">Inicia sesión</a>
        </p>
    </div>
    ```

    </div>

@endsection
