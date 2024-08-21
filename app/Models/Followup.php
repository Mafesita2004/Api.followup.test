<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Followup extends Model
{
    use HasFactory;

protected $fillable =[
'Evaluación_de_progreso',
'Actividades_Realizadas',
'Fecha_Inicio',
'Fecha_Fin',
'Etapa practica',
'Bitacoras',
'Informe_visita',
'trainer_id',
'superadmin_id',
'apprentice_id'

];

protected $table = 'followups';

public function trainer()
    {
        return $this->belongsTo(Trainer::class);
    }

    public function superadmin()
    {
        return $this->belongsTo(Superadmin::class);
    }

    public function apprentice()
    {
        return $this->hasOne(Apprentice::class);
    }

}
