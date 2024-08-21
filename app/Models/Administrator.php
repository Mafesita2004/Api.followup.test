<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notification;

class Administrator extends Model
{
    use HasFactory;


    protected $fillable = ['Name', 'Last_name', 'Cedula', 'Email', 'Cell_phone', 'Country', 'Departament', 'Municipality', 'Neighborhood', 'Address'];

    public function notifications(){
        return $this->belongsTo(Notification::class);
    }
}
