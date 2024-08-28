<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Followup extends Model
{
    use HasFactory;

    protected $fillable = [
        'evaluacion_de_progreso',
        'actividades_realizadas',
        'fecha_inicio',
        'fecha_fin',
        'etapa_practica',
        'bitacoras',
        'informe_visita',
        'trainer_id',
        'superadmin_id',
        'apprentice_id',
    ];

    protected $table = 'followups';

    // Definir relaciones permitidas para inclusión
    protected $allowIncluded = ['trainer', 'superadmin', 'apprentice'];

    // Definir columnas permitidas para filtrado
    protected $allowFilter = ['name', 'evaluacion_de_progreso', 'actividades_realizadas', 'fecha_inicio', 'fecha_fin'];

    // Definir columnas permitidas para ordenación
    protected $allowSort = ['name', 'fecha_inicio', 'fecha_fin'];

    // Relaciones
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
        return $this->belongsTo(Apprentice::class);
    }

    // Scope para incluir relaciones
    public function scopeIncluded(Builder $query, $included = null)
    {
        $included = $included ?? request('included');

        if (empty($this->allowIncluded) || empty($included)) {
            return $query;
        }

        $relations = explode(',', str_replace(' ', '', $included));
        $allowIncluded = collect($this->allowIncluded);

        $filteredRelations = array_filter($relations, function($relationship) use ($allowIncluded) {
            return $allowIncluded->contains($relationship);
        });

        return $query->with($filteredRelations);
    }

    // Scope para filtrar por columnas específicas
    public function scopeFilter(Builder $query)
    {

        if (empty($this->allowFilter) || empty(request('filter'))) {
            return;
        }

        $filters = request('filter');
        $allowFilter = collect($this->allowFilter);

        foreach ($filters as $filter => $value) {

            if ($allowFilter->contains($filter)) {

                $query->where($filter, 'LIKE', '%' . $value . '%');//nos retorna todos los registros que conincidad, asi sea en una porcion del texto
            }
        }

        //http://api.codersfree1.test/v1/categories?filter[name]=depo
        //http://api.codersfree1.test/v1/categories?filter[name]=posts&filter[id]=2

    }
    public function scopeSort(Builder $query)
    {
        if (empty($this->allowSort) || empty(request('sort'))) {
            return $query;
        }

        $sortFields = explode(',', request('sort'));
        $allowSort = collect($this->allowSort);

        foreach ($sortFields as $sortField) {
            $direction = 'asc';

            if (substr($sortField, 0, 1) == '-') {
                $direction = 'desc';
                $sortField = substr($sortField, 1);
            }

            if ($allowSort->contains($sortField)) {
                $query->orderBy($sortField, $direction);
            }
        }

        return $query;
    }

    // Scope para obtener o paginar resultados
    public function scopeGetOrPaginate(Builder $query)
    {
        if (request('perPage')) {
            $perPage = intval(request('perPage'));
            if ($perPage) {
                return $query->paginate($perPage);
            }
        }

        return $query->get();
    }
}
