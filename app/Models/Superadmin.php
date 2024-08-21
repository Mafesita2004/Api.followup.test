<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notification;

class Superadmin extends Model
{
    use HasFactory;


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
    public function followups()
    {
        return $this->hasMany(Followup::class);
    }
=======
    public function notifications(){
        return $this->belongsTo(Notification::class);
    }

>>>>>>> 8a889721dd544061fe3fff76e2edb113c1c6bb5c
}


