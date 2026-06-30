<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Seance extends Model
{
    public $timestamps = false;

    public function film(): BelongsTo
    {
        return $this->belongsTo(Film::class, 'id_film', 'id_film');
    }
    public function salle(): BelongsTo
    {
        return $this->belongsTo(Salle::class, 'id_salle', 'id');
    }
}