<?php

namespace App\Http\Controllers;

use App\Models\Followup;
use Illuminate\Http\Request;

class FollowupController extends Controller
{
    public function index()
    {
        $followups = Followup::all();
        return response()->json($followups);
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'Evaluación_de_progreso' => 'required|string|max:255',
            'Actividades_Realizadas' => 'required|integer',
            'Fecha_Inicio' => 'required|string',
            'Fecha_Fin' => 'required|string',
            'Etapa_practica' => 'required|string|max:255',
            'Bitacoras' => 'required|integer',
            'Informe_visita' => 'required|string',
            'trainer_id' => 'nullable|required|exists:trainers,id',
            'superadmin_id' => 'nullable|required|exists:superadmins,id',
            'apprentice_id' => 'nullable|required|exists:apprentices,id'
        ]);

        $followup = Followup::create($request->all());

        return response()->json('Seguimiento se a creado con éxito.');
    }


    public function show($id)
    {
        $followup = Followup::findOrFail($id);
        return response()->json($followup);
    }

    public function update(Request $request, Followup $followup)
    {
        $validated = $request->validate([
            'Evaluación_de_progreso' => 'required|string|max:255',
            'Actividades_Realizadas' => 'required|integer',
            'Fecha_Inicio' => 'required|string',
            'Fecha_Fin' => 'required|string',
            'Etapa_practica' => 'required|string|max:255',
            'Bitacoras' => 'required|integer',
            'Informe_visita' => 'required|string',
            'trainer_id' => 'nullable|required|exists:trainers,id',
            'superadmin_id' => 'nullable|required|exists:superadmins,id',
            'apprentice_id' => 'nullable|required|exists:apprentices,id'
        ]);


        $followup = Followup::create($request->all());

        return response()->json('Seguimiento actualizado con éxito.');
    }

    public function destroy(Followup $followup)
    {
        $followup->delete();
    return response()->json('Seguimiento eliminado con éxito.');
    }
}
