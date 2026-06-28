<?php

namespace App\Models;

use App\Models\Seance;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Reservation extends Model
{
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function film(): BelongsTo
    {
        return $this->belongsTo(Film::class, 'id_film', 'id_film');
    }

        public function seance(): BelongsTo
    {
        return $this->belongsTo(Seance::class, 'id_seance');
    }
}