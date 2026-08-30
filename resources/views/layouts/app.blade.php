<!DOCTYPE html>

<html lang="es">

<head>

```
<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>@yield('title', 'Gestión de Proyectos')</title>

<style>

    /*
     * Estilos generales de la aplicación.
     */
    * {
        box-sizing: border-box;
    }

    body {
        margin: 0;
        font-family: Arial, sans-serif;
        background: #f4f6f8;
        color: #1f2937;
    }

    /*
     * Barra de navegación.
     */
    .navbar {
        background: #1e3a8a;
        padding: 16px 40px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .navbar-logo {
        color: white;
        font-size: 20px;
        font-weight: bold;
        text-decoration: none;
    }

    .navbar-links {
        display: flex;
        gap: 20px;
    }

    .navbar-links a {
        color: white;
        text-decoration: none;
        font-size: 15px;
    }

    .navbar-links a:hover {
        text-decoration: underline;
    }

    /*
     * Contenedor general.
     */
    .main-container {
        min-height: calc(100vh - 65px);
        padding: 40px 20px;
    }

    /*
     * Tarjeta utilizada por Login y Registro.
     */
    .auth-card {
        width: 100%;
        max-width: 430px;
        margin: 50px auto;
        padding: 35px;
        background: white;
        border-radius: 14px;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
    }

    .auth-header {
        text-align: center;
        margin-bottom: 30px;
    }

    .auth-header h1 {
        margin-bottom: 8px;
        color: #1e3a8a;
    }

    .auth-header p {
        margin: 0;
        color: #6b7280;
        font-size: 14px;
    }

    /*
     * Campos de los formularios.
     */
    .form-group {
        margin-bottom: 20px;
    }

    .form-group label {
        display: block;
        margin-bottom: 7px;
        font-weight: bold;
    }

    .form-group input {
        width: 100%;
        padding: 12px;
        border: 1px solid #d1d5db;
        border-radius: 7px;
        font-size: 15px;
        outline: none;
    }

    .form-group input:focus {
        border-color: #2563eb;
        box-shadow: 0 0 0 2px rgba(37, 99, 235, 0.1);
    }

    /*
     * Botón principal.
     */
    .btn-principal {
        display: inline-block;
        width: 100%;
        padding: 12px 18px;
        border: none;
        border-radius: 7px;
        background: #2563eb;
        color: white;
        text-align: center;
        text-decoration: none;
        font-size: 15px;
        font-weight: bold;
        cursor: pointer;
    }

    .btn-principal:hover {
        background: #1d4ed8;
    }

    /*
     * Pie de los formularios.
     */
    .auth-footer {
        margin-top: 25px;
        text-align: center;
        font-size: 14px;
        color: #6b7280;
    }

    .auth-footer a {
        color: #2563eb;
        font-weight: bold;
        text-decoration: none;
    }

    .auth-footer a:hover {
        text-decoration: underline;
    }

    /*
     * Contenedor de proyectos.
     */
    .projects-container {
        max-width: 1100px;
        margin: 0 auto;
    }

    .projects-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 20px;
        margin-bottom: 30px;
    }

    .projects-header h1 {
        margin: 0 0 6px;
        color: #1e3a8a;
    }

    .projects-header p {
        margin: 0;
        color: #6b7280;
    }

    .projects-header .btn-principal {
        width: auto;
    }

    /*
     * Tarjetas de proyectos.
     */
    .projects-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 20px;
    }

    .project-card {
        background: white;
        padding: 25px;
        border-radius: 12px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.07);
        transition: transform 0.2s ease;
    }

    .project-card:hover {
        transform: translateY(-3px);
    }

    .project-card-header {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        gap: 10px;
        margin-bottom: 20px;
    }

    .project-card h2 {
        margin: 0;
        font-size: 20px;
    }

    .project-status {
        padding: 5px 9px;
        border-radius: 20px;
        background: #dbeafe;
        color: #1e40af;
        font-size: 12px;
        font-weight: bold;
    }

    .project-info p {
        margin: 10px 0;
        color: #4b5563;
        font-size: 14px;
    }

    .empty-projects {
        grid-column: 1 / -1;
        padding: 50px 20px;
        background: white;
        border-radius: 12px;
        text-align: center;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.07);
    }

    .empty-projects h2 {
        margin-bottom: 8px;
    }

    .empty-projects p {
        color: #6b7280;
    }

    /*
     * Adaptación para celulares.
     */
    @media (max-width: 600px) {

        .navbar {
            padding: 15px 20px;
        }

        .navbar-links {
            gap: 10px;
        }

        .main-container {
            padding: 20px 15px;
        }

        .auth-card {
            margin: 25px auto;
            padding: 25px 20px;
        }

        .projects-header {
            flex-direction: column;
            align-items: stretch;
        }

        .projects-header .btn-principal {
            width: 100%;
        }

    }

</style>
```

</head>

<body>

```
<!--
    Barra de navegación general.
    Las rutas definitivas serán configuradas posteriormente.
-->
<nav class="navbar">

    <a href="#" class="navbar-logo">
        Tech Solutions
    </a>

    <div class="navbar-links">

        <a href="/login">
            Iniciar sesión
        </a>

        <a href="/register">
            Registrarse
        </a>

        <form method="POST" action="{{ route('logout') }}" style="display: inline;">
    @csrf
    <button type="submit" class="enlace-logout">
        Cerrar Sesión
    </button>
</form>
    </div>

</nav>

<!-- Contenido específico de cada vista -->
<main class="main-container">

    @yield('content')

</main>
```

</body>

</html>
