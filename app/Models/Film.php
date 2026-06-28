<?php

namespace App\Models;

use App\Models\Genre;
use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;



#[Table(key: 'id_film')]
class Film extends Model
{
    public $timestamps = false;
    // get the genre of the film
    public function genre(): BelongsTo
    {
        return $this->belongsTo(Genre::class, 'id_genre');
    }
}
