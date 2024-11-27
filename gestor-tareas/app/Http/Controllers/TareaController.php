<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tarea;
use App\Models\Estado;

class TareaController extends Controller
{
    /**
     * @OA\Info(
     *     title="Gestor de Tareas API",
     *     version="1.0.0",
     *     description="API para gestionar tareas",
     *     @OA\Contact(
     *         email="soporte@gestortareas.com"
     *     ),
     *     @OA\License(
     *         name="MIT",
     *         url="https://opensource.org/licenses/MIT"
     *     )
     * )
     */

    /**
     * @OA\Get(
     *     path="/api/gettareas",
     *     summary="Obtiene todas las tareas",
     *     tags={"Tareas"},
     *     @OA\Response(
     *         response=200,
     *         description="Lista de tareas",
     *         @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/Tarea"))
     *     ),
     *     @OA\Response(
     *         response=401,
     *         description="No autorizado"
     *     )
     * )
     */
    public function index()
    {
        $tareas = Tarea::all();
        return view('tareas.index', compact('tareas'));
    }


    public function create()
    {
        $estados = Estado::all();
        return view('tareas.create', compact('estados'));
    }

    // Guardar nueva tarea
    public function store(Request $request)
    {
        $request->validate([
            'dni' => 'required',
            'titulo' => 'required',
            'descripcion' => 'required',
            'fecha_vencimiento' => 'required|date',
            'estado_id' => 'required|exists:estados,id',
        ]);

        Tarea::create([
            'dni' => $request->dni,
            'titulo' => $request->titulo,
            'descripcion' => $request->descripcion,
            'fecha_vencimiento' => $request->fecha_vencimiento,
            'estado_id' => $request->estado_id,
        ]);

        return redirect('/gettareas')->with('success', 'Tarea creada con éxito');
    }

    public function edit($id)
    {
        $tarea = Tarea::findOrFail($id);
        $estados = Estado::all();

        return view('tareas.edit', compact('tarea', 'estados'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'dni' => 'required',
            'titulo' => 'required',
            'descripcion' => 'required',
            'fecha_vencimiento' => 'required|date',
            'estado_id' => 'required|exists:estados,id',
        ]);

        $tarea = Tarea::findOrFail($id);
        $tarea->update($request->only(['dni', 'titulo', 'descripcion', 'fecha_vencimiento', 'estado_id']));

        return redirect('/gettareas')->with('success', 'Tarea actualizada con éxito');
    }

    public function destroy($id)
    {
        $tarea = Tarea::findOrFail($id);
        $tarea->delete();

        return redirect()->route('tareas.index')->with('success', 'Tarea eliminada correctamente');
    }
}
