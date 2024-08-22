<?php

namespace App\Http\Controllers;

use App\Models\Diary;
use Illuminate\Http\Request;

class DiaryController extends Controller
{
      public function index()
    {
        $diary=Diary::all();

        return response()->json($diary);
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
            'name' => 'required|max:255',
            'email' => 'required|max:255',
            'telephone' => 'required|max:255',
           
        ]);

        $diary = Diary::create($request->all());

        return response()->json($diary);
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
        $diary= Diary::findOrFail($id);
        return response()->json($diary);
        //http://api.codersfree1.test/v1/categories/1/?included=posts.user
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Diary $diary)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Diary $diary)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|max:255',
            'telephone' => 'required|max:255',
           
        ]);

        $diary->update($request->all());

        return response()->json('ACTUALIZADO CORRECTAMENTE');
    }

    public function destroy(Diary $diary)
    {
        $diary->delete();
        return response()->json($diary);
    }
}

