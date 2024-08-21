<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trainer extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'last_name','identification_card','email','cell_phone',
    'program','total_hours','hours_worked','start_date','ending_date',
    'country','department','municipality','neighborhood','address'];

    protected $table= 'trainers';

    public function followups()
    {
        return $this->hasMany(Followup::class);
    }
}
