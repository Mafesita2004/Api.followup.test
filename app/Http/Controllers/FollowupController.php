<?php

namespace App\Http\Controllers;

use App\Models\Followup;
use Illuminate\Http\Request;

class FollowupController extends Controller
{
    public function index()
    {
        $followups = Followup::all();
        return view('followups.index', compact('followups'));
    }

    public function create()
    {
        return view('followups.create');
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

        Followup::create($validated);

        return redirect()->route('followups.index')->with('success', 'Seguimiento creado con éxito.');
    }

    public function show(Followup $followup)
    {
        return view('followups.show', compact('followup'));
    }

    public function edit(Followup $followup)
    {
        return view('followups.edit', compact('followup'));
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

        $followup->update($validated);

        return redirect()->route('followups.index')->with('success', 'Seguimiento actualizado con éxito.');
    }

    public function destroy(Followup $followup)
    {
        $followup->delete();

        return redirect()->route('followups.index')->with('success', 'Seguimiento eliminado con éxito.');
    }
}
