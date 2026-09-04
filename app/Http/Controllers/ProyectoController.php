<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proyecto;
use League\Uri\StringCoercionMode;
use App\DTOs\ApiResponseDTO;

class ProyectoController extends Controller
{
    public function index() // muestra todos los proyectos
    {
        $proyectos = Proyecto::all();

        if (!$proyectos || $proyectos->isEmpty()) {
            $response = new ApiResponseDTO(
                200,
                'No existen proyectos en la base de datos',
                []
            );
            return response()->json($response, 200);
        }

        $response = new ApiResponseDTO(
                200,
                'Proyectos obtenidos correctamente',
                $proyectos
            );

        return response()->json($response, 200);
    }

    public function store(Request $request) // guarda un nuevo proyecto
    {
        try {
            $validated = $request->validate([
                'nombre' => ['required', 'string', 'max:255'],
                'fecha_inicio' => ['required', 'date'],
                'estado' => ['required', 'string', 'in:pendiente,en progreso,completado'],
                'responsable' => ['required', 'string', 'max:255'],
                'monto' => ['required', 'numeric', 'min:0'],
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            $response = new ApiResponseDTO(
                422,
                'Los datos proporcionados no son válidos',
                $e->errors()
            );

            return response()->json($response, 422);
        }

        $proyecto = Proyecto::create([
            ...$validated,
            'created_by' => $request['created_by'],
        ]);

        $response = new ApiResponseDTO(
                201,
                'Proyecto creado correctamente',
                $proyecto
            );

        return response()->json($response, 201);
    }

    public function show($proyecto) #muestra un proyecto específico
    {
        $foundproyecto = Proyecto::find($proyecto); #Si el Id no existe debe retornar 404.

        if (!$foundproyecto) {
            $response = new ApiResponseDTO(
                404,
                'El id de proyecto no existe',
                $proyecto
            );
            return response()->json($response, 404);
        }

        $response = new ApiResponseDTO(
            200,
            'Proyecto encontrado',
            $foundproyecto
        );
        return response()->json($response, 200);
    }


    public function update(Request $request, $proyecto) #actualiza un proyecto específico con los datos enviados desde el formulario de edición
    {
        $foundproyecto = Proyecto::find($proyecto); #Si el Id no existe debe retornar 404.

        if (!$foundproyecto) {
            $response = new ApiResponseDTO(
                404,
                'El id de proyecto no existe',
                $proyecto
            );
            return response()->json($response, 404);
        }

        try {
            $validated = $request->validate([
                'nombre' => ['required', 'string', 'max:255'],
                'fecha_inicio' => ['required', 'date'],
                'estado' => ['required', 'string', 'in:pendiente,en progreso,completado'],
                'responsable' => ['required', 'string', 'max:255'],
                'monto' => ['required', 'numeric', 'min:0'],
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            $response = new ApiResponseDTO(
                422,
                'Los datos proporcionados no son válidos',
                $e->errors()
            );
            return response()->json($response, 422);
        }

        $foundproyecto->update($validated);

        $response = new ApiResponseDTO(
            200,
            'Proyecto actualizado correctamente',
            $foundproyecto
        );
        return response()->json($response, 200);
    }

    public function destroy($proyecto) #elimina un proyecto específico de la base de datos
    {
        $foundproyecto = Proyecto::find($proyecto); #Si el Id no existe debe retornar 404.

        if (!$foundproyecto) {
            $response = new ApiResponseDTO(
                404,
                'El id de proyecto no existe',
                $proyecto
            );
            return response()->json($response, 404);
        }

        $foundproyecto->delete();
        return response()->noContent(); //response 204
    }
}
