@extends('layouts.app')

@section('title', 'Proyectos')

@section('content')

    <div class="projects-container">

        <!-- Encabezado de la sección -->
        <div class="projects-header">

            <div>
                <h1>Mis Proyectos</h1>
                <p>Gestiona y consulta los proyectos registrados.</p>
            </div>

            <!--
                        Este botón quedará preparado para enlazar
                        posteriormente con la ruta de creación de proyectos.
                    -->
            <a href="{{ route('proyectos.create') }}" class="btn-principal">
                + Nuevo Proyecto
            </a>

        </div>

        <!-- Contenedor de proyectos -->
        <div class="projects-grid">

            @forelse($proyectos ?? [] as $proyecto)
                <div class="project-card">

                    <div class="project-card-header">
                        <h2>{{ $proyecto->nombre }}</h2>

                        <span class="project-status">
                            {{ $proyecto->estado }}
                        </span>
                    </div>

                    <div class="project-info">

                        <p>
                            <strong>Fecha de inicio:</strong>
                            {{ $proyecto->fecha_inicio }}
                        </p>

                        <p>
                            <strong>Responsable:</strong>
                            {{ $proyecto->responsable }}
                        </p>

                        <p>
                            <strong>Monto:</strong>
                            ${{ number_format($proyecto->monto, 0, ',', '.') }}
                        </p>

                        <div class="project-actions">

                            <a href="{{ route('proyectos.show', $proyecto) }}" class="btn-ver">
                                Ver detalles
                            </a>

                            <a href="{{ route('proyectos.edit', $proyecto) }}" class="btn-editar">
                                Editar
                            </a>

                            <a href="{{ route('proyectos.confirmarEliminar', $proyecto) }}" class="btn-eliminar">
                                Eliminar
                            </a>

                        </div>
                    </div>

                </div>

            @empty

                <!-- Mensaje mostrado cuando todavía no existen proyectos -->
                <div class="empty-projects">

                    <h2>No hay proyectos registrados</h2>

                    <p>
                        Cuando se registren proyectos,
                        aparecerán aquí.
                    </p>

                </div>
            @endforelse

        </div>

    </div>

@endsection
