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
}