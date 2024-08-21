<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;
    public function Superadmin(){
        return $this->hasMany(Superadmin::class);
    }
    public function Administrator(){
        return $this->hasMany(Administrator::class);
    }
    public function Trainer(){
        return $this->hasMany(Trainer::class);
    }
    public function Apprentice(){
        return $this->hasMany(Apprentice::class);
    }

}
