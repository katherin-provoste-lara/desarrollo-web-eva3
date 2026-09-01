@extends('layouts.app')

@section('title', 'Detalle Proyecto')

@section('content')



    <!-- Esta vista muestra la información completa de un proyecto seleccionado.
                                Sirve para consultar los detalles de un proyecto específico. -->


    <div class="detalle-proyecto">

        <h1>Detalle del Proyecto</h1>

        <p>
            <strong>ID:</strong>
            {{ $response->data->id }}
        </p>

        <p>
            <strong>Nombre:</strong>
            {{ $response->data->nombre }}
        </p>

        <p>
            <strong>Fecha Inicio:</strong>
            {{ $response->data->fecha_inicio }}
        </p>

        <p>
            <strong>Estado:</strong>
            {{ $response->data->estado }}
        </p>

        <p>
            <strong>Responsable:</strong>
            {{ $response->data->responsable }}
        </p>

        <p>
            <strong>Monto:</strong>
            $ {{ $response->data->monto }}
        </p>

        <a href="{{ route('proyectos.index') }}" class="boton">
            Volver al listado
        </a>

    </div>

@endsection
