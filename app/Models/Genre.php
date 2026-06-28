<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;



#[Table(key: 'id_genre')]
class Genre extends Model
{
    //get the films for the genre 
     public function films(): HasMany
     {
         return $this->hasMany(Film::class, 'id_genre');
     }
}
