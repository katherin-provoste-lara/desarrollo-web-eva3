@extends('layouts.app')

@section('title', 'Crear Proyecto')

@section('content')

    <div class="projects-container">

        <div class="projects-header">
            <div>
                <h1>Crear Nuevo Proyecto</h1>
                <p>Ingresa los datos del nuevo proyecto.</p>
            </div>
        </div>

        <div class="project-card">

            @if ($errors->any())
                <div style="background: #fee2e2; color: #dc2626; padding: 12px; margin-bottom: 20px; border-radius: 7px;">
                    <ul style="margin: 0; padding-left: 20px;">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('proyectos.store') }}" method="POST">

                @csrf

                <div class="form-group">
                    <label for="nombre">Nombre del proyecto</label>

                    <input
                        type="text"
                        id="nombre"
                        name="nombre"
                        value="{{ old('nombre') }}"
                        placeholder="Ingrese nombre del proyecto"
                        required
                    >
                </div>

                <div class="form-group">
                    <label for="fecha_inicio">Fecha de inicio</label>

                    <input
                        type="date"
                        id="fecha_inicio"
                        name="fecha_inicio"
                        value="{{ old('fecha_inicio') }}"
                        required
                    >
                </div>

                <div class="form-group">
                    <label for="estado">Estado</label>

                    <select
                        id="estado"
                        name="estado"
                        required
                    >
                        <option value="pendiente">Pendiente</option>
                        <option value="en progreso">En progreso</option>
                        <option value="completado">Completado</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="responsable">Responsable</label>

                    <input
                        type="text"
                        id="responsable"
                        name="responsable"
                        value="{{ old('responsable') }}"
                        placeholder="Ingrese responsable"
                        required
                    >
                </div>

                <div class="form-group">
                    <label for="monto">Monto</label>

                    <input
                        type="number"
                        id="monto"
                        name="monto"
                        value="{{ old('monto') }}"
                        placeholder="Ingrese monto"
                        min="0"
                        required
                    >
                </div>

                <button type="submit" class="btn-principal">
                    Guardar Proyecto
                </button>

            </form>

        </div>

    </div>

@endsection