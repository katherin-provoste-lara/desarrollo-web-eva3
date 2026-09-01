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

        // Respuesta para la API
        if (request()->is('api/*')) {
            $response = new ApiResponseDTO(
                200,
                'Proyectos obtenidos correctamente',
                $proyectos
            );

            return response()->json($response, 200);
        }

        // Respuesta para la página web
        $valorUF = $this->calcularUF('2026-07-15');

        return view('proyectos.index')
            ->with('proyectos', $proyectos)
            ->with('valorUF', $valorUF);
    }

    public function create() #muestra el formulario para crear un nuevo proyecto
    {
        return view('proyectos.create');
    }

    public function store(Request $request) #guarda un nuevo proyecto en la base de datos
    {
        $validated = $request->validate([
            'nombre' => ['required', 'string', 'max:255'],
            'fecha_inicio' => ['required', 'date'],
            'estado' => ['required', 'string', 'in:pendiente,en progreso,completado'],
            'responsable' => ['required', 'string', 'max:255'],
            'monto' => ['required', 'numeric', 'min:0'],
        ]);

        $proyecto = Proyecto::create([
            ...$validated,
            'created_by' => 1,
        ]);

        if ($request->is('api/*')) {
            $response = new ApiResponseDTO(
                201,
                'Proyecto creado correctamente',
                $proyecto
            );

            return response()->json($response, 201);
        }

        return redirect()->route('proyectos.index');
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
            return response()->json($response, 200);
        }

        $response = new ApiResponseDTO(200, 'Proyecto encontrado', $foundproyecto);

        return view('proyectos.show')
            ->with('response', $response); #se pasa el proyecto específico a la vista
    }

    public function edit($proyecto) #muestra el formulario para editar un proyecto específico
    {
        $foundproyecto = Proyecto::find($proyecto); #Si el Id no existe debe retornar 404.

        if (!$foundproyecto) {
            $response = new ApiResponseDTO(
                404,
                'El id de proyecto no existe',
                $proyecto
            );
            return response()->json($response, 200);
        }

        return view('proyectos.edit')
            ->with('proyecto', $foundproyecto); #se pasa el proyecto específico a la vista
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
            return response()->json($response, 200);
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
            return response()->json($response, 200);
        }

        $foundproyecto->delete();
        return response()->noContent(); //response 204
    }

    function calcularUF(string $fecha): float #simula la obtención del valor de la UF para una fecha específica
    {
        #Valores de ejemplo por fechas
        $valoresUF = [
            '2026-07-01' => 38245.67,
            '2026-07-15' => 38312.40,
            '2026-08-01' => 38401.15,
        ];

        return $valoresUF[$fecha] ?? 0.0;
    }

    public function confirmarEliminar($proyecto)
    {
        $foundproyecto = Proyecto::find($proyecto); #Si el Id no existe debe retornar 404.

        if (!$foundproyecto) {
            $response = new ApiResponseDTO(
                404,
                'El id de proyecto no existe',
                $proyecto
            );
            return response()->json($response, 200);
        }

        return view('proyectos.delete')
            ->with('proyecto', $foundproyecto);
    }
}
