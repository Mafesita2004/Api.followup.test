<?php

namespace App\Http\Controllers;

use App\Models\Trainer;
use Illuminate\Http\Request;

class TrainerController extends Controller
{
    public function index()
    {
        $trainers=Trainer::all();
        return response()->json($trainers);
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'identification_card' => 'required|max:255|unique:trainers',
            'email' => 'required|max:255|unique:trainers',
            'cell_phone' => 'required|max:255|unique:trainers',
            'program' => 'required|max:255',
            'total_hours' => 'required|max:255',
            'hours_worked' => 'required|max:255',
            'start_date' => 'required|max:255',
            'ending_date' => 'required|max:255',
            'country' => 'required|max:255',
            'department' => 'required|max:255',
            'municipality' => 'required|max:255',
            'neighborhood' => 'required|max:255',
            'address' => 'required|max:255',

        ]);

        $trainer = Trainer::create($request->all());

        return response()->json('Registrado con exito');
    }
    public function show($id)
    {
        $trainer = Trainer::findOrFail($id);
        return response()->json($trainer);
    }


    public function update(Request $request, Trainer $trainer)
    {
        $request->validate([

            'name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'identification_card' => 'required|max:255|unique:trainers,identification_card,' . $trainer->id,
            'email' => 'required|max:255|unique:trainers,email,' . $trainer->id,
            'cell_phone' => 'required|max:255|unique:trainers,cell_phone,' . $trainer->id,
            'program' => 'required|max:255',
            'total_hours' => 'required|max:255',
            'hours_worked' => 'required|max:255',
            'start_date' => 'required|max:255',
            'ending_date' => 'required|max:255',
            'country' => 'required|max:255',
            'department' => 'required|max:255',
            'municipality' => 'required|max:255',
            'neighborhood' => 'required|max:255',
            'address' => 'required|max:255',
        ]);

        $trainer->update($request->all());

        return response()->json('Actualizado');
    }


    public function destroy(Trainer $trainer)
    {
        $trainer->delete();
        return response()->json('Eliminado Correctamente');
    }


}
