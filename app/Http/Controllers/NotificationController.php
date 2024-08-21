<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index()
    {
        $notifications=Notification::all();
        return response()->json($notifications);
    }

    public function store(Request $request)
    {

        $request->validate([
            'fecha_envio' => 'required|max:255',
            'contenido' => 'required|max:255',


        ]);

        $notification = Notification::create($request->all());

        return response()->json('Registrado con exito');
    }
    public function show($id)
    {
        $notification = Notification::find($id);
        if(!$notification){
            return response()->json(['message'=>'No existe este registro'],404);
        }
        return response()->json($notification);
    }


    public function update(Request $request, Notification $notification)
    {
        $request->validate([

            'fecha_envio' => 'required|max:255',
            'contenido' => 'required|max:255',

        ]);

        $notification->update($request->all());

        return response()->json('Actualizado');
    }


    public function destroy($notification)
    {
        $notification = Notification::find($notification);

        if(!$notification){
            return response()->json(['message'=>'No existe este registro'],404);
        }
        $notification->delete();
        return response()->json('Eliminado Correctamente');
    }
}
