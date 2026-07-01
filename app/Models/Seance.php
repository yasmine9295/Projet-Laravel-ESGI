<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Seance extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $primaryKey = 'id';

    protected $fillable = [
        'id_film',
        'id_salle',
        'debut_seance',
        'fin_seance',
        'places_disponibles',
    ];

    public function film(): BelongsTo
    {
        return $this->belongsTo(Film::class, 'id_film', 'id_film');
    }

    public function salle(): BelongsTo
    {
        return $this->belongsTo(Salle::class, 'id_salle', 'id_salle');
    }
}
