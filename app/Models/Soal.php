<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Soal extends Model
{
    use HasFactory;

    protected $fillable = [
        'subbab_id',
        'soal',
        'jawaban',
        'option_a',
        'option_b',
        'option_c',
        'option_d',
    ];

    public function subbab()
    {
        return $this->belongsTo(Subbab::class);
    }
}
