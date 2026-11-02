<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Videogame extends Model
{
   protected $fillable = ['title', 'developer', 'genre_id', 'year'];

    protected function casts(): array
    {
        return [
            'year' => 'integer',
        ];
    }

    public function genre(): BelongsTo
    {
        return $this->belongsTo(Genre::class);
    }
}