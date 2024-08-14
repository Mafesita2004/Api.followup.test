<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Apprentice;
use Illuminate\Http\Request;

class ApprenticeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $apprentices=Apprentice::all();

        return response()->json($apprentices);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'identification' => 'required|max:255',
            'name' => 'required|max:255',
            'lastname' => 'required|max:255',
            'program' => 'required|max:255',
            'ficha' => 'required|max:255',
            'telephone' => 'required|max:255',
            'email' => 'required|max:255',
            'inicio_contrato' => 'required|max:255',
            'fin_contrato' => 'required|max:255',
            'nit_empresa' => 'required|max:255',
            'razon_social' => 'required|max:255',
            'address' => 'required|max:255',
            'telephone_empresa' => 'required|max:255',
            'name_trainer' => 'required|max:255',
            'email_trainer' => 'required|max:255',
        ]);

        $apprentice = Apprentice::create($request->all());

        return response()->json($apprentice);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {

       // $category = Category::findOrFail($id);
        // $category = Category::with(['posts.user'])->findOrFail($id);
        // $category = Category::with(['posts'])->findOrFail($id);
        // $category = Category::included();
        $apprentice = Apprentice::findOrFail($id);
        return response()->json($apprentice);
        //http://api.codersfree1.test/v1/categories/1/?included=posts.user
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Apprentice $apprentice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Apprentice $apprentice)
    {
        $request->validate([
            'identification' => 'required|max:255',
            'name' => 'required|max:255',
            'lastname' => 'required|max:255',
            'program' => 'required|max:255',
            'ficha' => 'required|max:255',
            'telephone' => 'required|max:255',
            'email' => 'required|max:255',
            'inicio_contrato' => 'required|max:255',
            'fin_contrato' => 'required|max:255',
            'nit_empresa' => 'required|max:255',
            'razon_social' => 'required|max:255',
            'address' => 'required|max:255',
            'telephone_empresa' => 'required|max:255',
            'name_trainer' => 'required|max:255',
            'email_trainer' => 'required|max:255',
        ]);

        $apprentice->update($request->all());

        return response()->json('ACTUALIZADO CORRECTAMENTE');
    }

    public function destroy(Apprentice $apprentice)
    {
        $apprentice->delete();
        return response()->json($apprentice);
    }
}
