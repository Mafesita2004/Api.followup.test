<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notification;

class Superadmin extends Model
{
    use HasFactory;

    public function notifications(){
        return $this->belongsTo(Notification::class);
    }
     // Campos que se pueden asignar de manera masiva
     protected $fillable = [
        'identificacion',
        'name',
        'last_name',
        'email',
        'password',
        'phone',
        'address',
        'department',
        'municipality',
        'neighborhood',
        'country',
        'Birthdate'
    ];
    protected $table='superadmins';
<<<<<<< HEAD

}
=======
>>>>>>> 15e2533231d26e4dfc4d9a9944d81039f87268cb

}
