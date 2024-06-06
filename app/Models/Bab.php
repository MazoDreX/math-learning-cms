<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bab extends Model
{
    use HasFactory;

    protected $fillable = [
        'kelas',
        'judul',
        'slug',
    ];

    public function subbabs()
    {
        return $this->hasMany(Subbab::class);
    }
}
