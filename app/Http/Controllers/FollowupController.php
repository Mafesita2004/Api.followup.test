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
            'Fecha_Inicio' => 'required|date',
            'Fecha_Fin' => 'required|date',
            'Etapa practica' => 'required|string|max:255',
            'Bitacoras' => 'required|integer',
            'Informe_visita' => 'required|date',
            'trainer_id' => 'required|exists:trainers,id',
            'superadmin_id' => 'required|exists:superadmins,id',
            'apprentice_id' => 'required|exists:apprentices,id|unique:followups,apprentice_id',
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
            'Fecha_Inicio' => 'required|date',
            'Fecha_Fin' => 'required|date',
            'Etapa practica' => 'required|string|max:255',
            'Bitacoras' => 'required|integer',
            'Informe_visita' => 'required|date',
            'trainer_id' => 'required|exists:trainers,id',
            'superadmin_id' => 'required|exists:superadmins,id',
            'apprentice_id' => 'required|exists:apprentices,id|unique:followups,apprentice_id,' . $followup->id,
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
