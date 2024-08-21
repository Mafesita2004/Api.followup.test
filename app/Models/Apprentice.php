<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notification;

class Apprentice extends Model
{
    use HasFactory;

    protected $fillable = [
       'identification',
            'name',
            'lastname',
            'program',
            'ficha',
            'telephone',
            'email',
            'inicio_contrato',
            'fin_contrato',
            'nit_empresa',
            'razon_social' ,
            'address',
            'telephone_empresa',
            'name_trainer',
            'email_trainer',
    ];
<<<<<<< HEAD
    public function followup()
    {
        return $this->belongsTo(Followup::class);
=======
    public function notifications(){
        return $this->belongsTo(Notification::class);
>>>>>>> 8a889721dd544061fe3fff76e2edb113c1c6bb5c
    }
}
