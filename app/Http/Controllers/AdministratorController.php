<?php

namespace App\Http\Controllers;

use App\Models\Administrator;
use Illuminate\Http\Request;

class AdministratorController extends Controller
{
    /**
     * Display a listing of the administrators.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        // Usa el scope 'included' para cargar relaciones según lo solicitado.
        $administrators = Administrator::included()->get(); // Obtén los resultados.

        return response()->json($administrators);
    }

    /**
     * Store a newly created administrator in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        // Valida los datos de entrada.
        $request->validate([
            'Name' => 'required|max:255',
            'Last_name' => 'required|max:255',
            'Cedula' => 'required|max:255',
            'Email' => 'required|email|max:255|unique:administrators',
            'Cell_phone' => 'required|max:255|unique:administrators',
            'Country' => 'required|max:255',
            'Departament' => 'required|max:255',
            'Municipality' => 'required|max:255',
            'Neighborhood' => 'required|max:255',
            'Address' => 'required|max:255',
        ]);

        // Crea el nuevo administrador.
        $administrator = Administrator::create($request->all());

        // Responde con los datos del nuevo administrador creado.
        return response()->json($administrator, 201); // Código de estado 201 para creación exitosa.
    }

    /**
     * Display the specified administrator.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        // Encuentra el administrador y aplica el scope 'included' si es necesario.
        $administrator = Administrator::included()->findOrFail($id);

        return response()->json($administrator);
    }

    /**
     * Update the specified administrator in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Administrator $administrator
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Administrator $administrator)
    {
        // Valida los datos de entrada.
        $request->validate([
            'Name' => 'required|max:255',
            'Last_name' => 'required|max:255',
            'Cedula' => 'required|max:255',
            'Email' => 'required|email|max:255|unique:administrators,email,' . $administrator->id,
            'Cell_phone' => 'required|max:255|unique:administrators,cell_phone,' . $administrator->id,
            'Country' => 'required|max:255',
            'Departament' => 'required|max:255',
            'Municipality' => 'required|max:255',
            'Neighborhood' => 'required|max:255',
            'Address' => 'required|max:255',
        ]);

        // Actualiza el administrador con los datos proporcionados.
        $administrator->update($request->all());

        return response()->json($administrator); // Devuelve el administrador actualizado.
    }

    /**
     * Remove the specified administrator from storage.
     *
     * @param \App\Models\Administrator $administrator
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Administrator $administrator)
    {
        // Elimina el administrador.
        $administrator->delete();

        return response()->json(['message' => 'Eliminado Correctamente']); // Añade una clave 'message' para la claridad.
    }
}
