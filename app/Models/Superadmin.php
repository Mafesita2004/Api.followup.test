<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

    // Relaciones que pueden ser incluidas en las consultas
    // Asegúrate de definir correctamente estas relaciones en el modelo
    protected $allowIncluded = [
        'posts',
        'posts.user'
    ];

    // Campos permitidos para filtrar en las consultas
    protected $allowFilter = [
        'id',
        'identificacion',
        'name',
        'last_name',
        'email',
        'phone',
        'address',
        'department',
        'municipality',
        'neighborhood',
        'country',
        'Birthdate'
    ];

    // Campos permitidos para ordenar en las consultas
    protected $allowSort = [
        'id',
        'name',
        'last_name',
        'email',
        'identificacion'
    ];
    
}

