<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Superadmin;
use Illuminate\Http\Request;

class SuperadminController extends Controller
{
    //
    public function index()
    {
    $superadmins=Superadmin::all();
    return Response()->json($superadmins);
}

public function store(Request $request)
    {

        $request->validate([
            'identificacion' => 'required|max:255|',
            'name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'email' => 'required|max:255|',
            'password' => 'required|max:255',
            'phone' => 'required|max:255',
            'address' => 'required|max:255',
            'department' => 'required|max:255',
            'municipality' => 'required|max:255',
            'neighborhood' => 'required|max:255',
            'country' => 'required|max:255',
            'Birthdate' => 'required|max:255',           
        ]);
        $superadmin= Superadmin::create($request->all());

        return response()->json('registrado correctamente');
    }


public function show($id) //si se pasa $id se utiliza la comentada
{   $superadmin = Superadmin::findOrFail($id);
    return response()->json($superadmin);
}
public function update(Request $request, Superadmin $superadmin)
{
    $request->validate([
        'identificacion' => 'required|max:255|',
        'name' => 'required|max:255',
        'last_name' => 'required|max:255',
        'email' => 'required|max:255|unique:superadmins',
        'password' => 'required|max:255',
        'phone' => 'required|max:255',
        'address' => 'required|max:255',
        'department' => 'required|max:255',
        'municipality' => 'required|max:255',
        'neighborhood' => 'required|max:255',
        'country' => 'required|max:255',
        'Birthdate' => 'required|max:255',

    ]);

    $superadmin->update($request->all());

    return response()->json('actualizado correctamente');
}
public function destroy(Superadmin $superadmin)
    {
        $superadmin->delete();
        return response()->json('eliminado correctamente');
    }
}