<?php

namespace App\Http\Controllers;

use App\Models\Followup;
use Illuminate\Http\Request;

class FollowupController extends Controller
{
    public function index(Request $request)
    {
        $included = $request->input('included');

        $followups = Followup::included($included);
        $followups = Followup::included()->filter();
        $followups = Followup::included()->filter()->sort()->get();
        $followups = Followup::included()->filter()->sort()->getOrPaginate();

        return response()->json($followups);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'evaluacion_de_progreso' => 'required|string|max:255',
            'actividades_realizadas' => 'required|integer',
            'fecha_inicio' => 'required|string',
            'fecha_fin' => 'required|string',
            'etapa_practica' => 'required|string|max:255',
            'bitacoras' => 'required|integer',
            'informe_visita' => 'required|string',
            'trainer_id' => 'nullable|exists:trainers,id',
            'superadmin_id' => 'nullable|exists:superadmins,id',
            'apprentice_id' => 'nullable|exists:apprentices,id'
        ]);

        $followup = Followup::create($validated);

        return response()->json($followup, 201);
    }

    public function show($id)
    {
        $followup = Followup::findOrFail($id);
        return response()->json($followup);
    }

    public function update(Request $request, Followup $followup)
    {
        $validated = $request->validate([
            'evaluacion_de_progreso' => 'required|string|max:255',
            'actividades_realizadas' => 'required|integer',
            'fecha_inicio' => 'required|string',
            'fecha_fin' => 'required|string',
            'etapa_practica' => 'required|string|max:255',
            'bitacoras' => 'required|integer',
            'informe_visita' => 'required|string',
            'trainer_id' => 'nullable|exists:trainers,id',
            'superadmin_id' => 'nullable|exists:superadmins,id',
            'apprentice_id' => 'nullable|exists:apprentices,id'
        ]);

        $followup->update($validated);

        return response()->json($followup);
    }

    
    public function destroy(Followup $followup)
    {
        $followup->delete();
        return response()->json(null, 204);
    }


}
