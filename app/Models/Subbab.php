<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subbab extends Model
{
    use HasFactory;

    protected $fillable = [
        'bab_id',
        'subbabJudul',
        'subbabIsi',
        'slug',
        'tags',
    ];

    protected $casts = [
        'tags' => 'array',
    ];

    public function bab()
    {
        return $this->belongsTo(Bab::class);
    }
}
