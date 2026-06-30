<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Salle extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'id_salle';

    public function seances(): HasMany
    {
        return $this->hasMany(Seance::class, 'id_salle', 'id_salle');
    }
}
