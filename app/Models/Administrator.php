<?php

namespace App\Models;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notification;

class Administrator extends Model
{
    use HasFactory;

    // Campos que se van a asignación masiva
    protected $fillable = [
        'Name', 'Last_name', 'Cedula', 'Email', 'Cell_phone',
        'Country', 'Departament', 'Municipality', 'Neighborhood', 'Address'
    ];

    // Relaciones permitidas para ser incluidas en la consulta
    protected $allowIncluded = ['notifications', 'superadmin'];

    /**
     * Relación con el modelo Notification.
     * Un administrador puede tener muchas notificaciones.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function notifications()
    {
        return $this->hasMany(Notification::class);
    }

    /**
     * Relación con el modelo Superadmin.
     * Un administrador pertenece a un superadmin.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function superadmin()
    {
        return $this->belongsTo(Superadmin::class);
    }

    /**
     * Scope para incluir relaciones en la consulta.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeIncluded(Builder $query)
    {
        if (empty($this->allowIncluded) || empty(request('included'))) {
            return $query; // Asegúrate de devolver la consulta sin modificaciones.
        }

        $relations = explode(',', request('included'));
        $allowIncluded = collect($this->allowIncluded);

        // Filtra las relaciones permitidas
        $relations = collect($relations)->filter(function ($relationship) use ($allowIncluded) {
            return $allowIncluded->contains(trim($relationship));
        })->toArray();

        // Carga las relaciones filtradas
        return $query->with($relations);
    }

}
