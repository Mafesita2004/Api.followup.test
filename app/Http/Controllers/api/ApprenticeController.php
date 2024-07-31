<?php

namespace App\Http\Controllers;

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
            'telephone' => 'required|max:255',
            'email' => 'required|max:255',
            'address' => 'required|max:255',
            

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
        $apprentice = Apprentice::included()->findOrFail($id);
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
            'name' => 'required|max:255',
            'slug' => 'required|max:255|unique:categories,slug,' . $apprentice->id,

        ]);

        $apprentice->update($request->all());

        return response()->json($apprentice);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Apprentice $apprentice)
    {
        $apprentice->delete();
        return response()->json($apprentice);
    }
}
