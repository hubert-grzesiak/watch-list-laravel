<?php

namespace App\Models;

use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Casts\Attribute;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Show extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'description',
        'image',
        'genre',
        'rating',
        'year',
        'numberOfEpisodes',
        'type',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];


    /**
     * Produkt ma przypisanego jednego producenta
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function platforms()
    {
        return $this->belongsToMany(Platform::class, 'show_platforms', 'show_id', 'platform_id');

    }

    /**
     * Produkt może mieć przypisanych wiele kategorii
     */
    public function categories()
    {
        return $this->belongsToMany(Category::class, 'show_categories', 'show_id', 'category_id');
    }



    /**
     * Pełna ścieżka do zdjęcia produktu.
     *
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */
    protected function image(): Attribute
    {
        return Attribute::make(
            get: function ($value) {
                if ($value === null) {
                    return null;
                }
                return $value;
            },
        );
    }

    /**
     * Zwraca adres URL zdjęcia produktu
     *
     * @return string
     */
    public function imageUrl(): string
    {
        return $this->imageExists()
            ? Storage::url($this->image)
            : Storage::url(
                config('filesystems.default_image')
            );
    }

    /**
     * Sprawdza, czy zdjęcie istnieje dla produktu
     *
     * @return boolean
     */
    public function imageExists(): bool
    {
        return $this->image !== null
            && Storage::disk('public')->exists($this->image);
    }

    /**
     * Wylicza koszt zakup zadanej ilości produktu
     *
     * @param integer $qty
     * @return float
     */
}
