<?php

namespace App\Http\Controllers;

use App\Models\Administrator;
use Illuminate\Http\Request;

class AdministratorController extends Controller
{

    public function index()
    {
        $administrators=Administrator::all();
        return response()->json($administrators);
    }

    public function store(Request $request)
    {
        $request->validate([
            'Name' => 'required|max:255',
            'Last_name' => 'required|max:255',
            'Cedula' => 'required|max:255|unique:administrators',
            'Email' => 'required|max:255|unique:administrators',
            'Cell_phone' => 'required|max:255|unique:administrators',
            'Country' => 'required|max:255',
            'Departament' => 'required|max:255',
            'Municipality' => 'required|max:255',
            'Neighborhood' => 'required|max:255',
            'Address' => 'required|max:255',


        ]);

        $administrator = Administrator::create($request->all());

        return response()->json($administrator);
    }


    public function show($id)
    {
        $administrator = Administrator::included()->findOrFail($id);
        return response()->json($administrator);
    }


    public function update(Request $request, Administrator $administrator)
    {
        $request->validate([
            'Name' => 'required|max:255',
            'Last_name' => 'required|max:255',
            'Cedula' => 'required|max:255|unique:administrators,' . $administrator->id,
            'Email' => 'required|max:255|unique:administrators,' . $administrator->id,
            'Cell_phone' => 'required|max:255|unique:administrators,' . $administrator->id,
            'Country' => 'required|max:255',
            'Departament' => 'required|max:255',
            'Municipality' => 'required|max:255',
            'Neighborhood' => 'required|max:255',
            'Address' => 'required|max:255',

        ]);

        $administrator->update($request->all());

        return response()->json($administrator);
    }


    public function destroy(Administrator $administrator)
    {
        $administrator->delete();
        return response()->json($administrator);
    }




}
