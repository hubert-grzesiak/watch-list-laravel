<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Platform extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name'
    ];
    /**
     * Kategoria może mieć przypisanych wiele produktów
     */
    public function shows()
    {
        return $this->belongsToMany(Show::class);
    }

}
