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
        'platform',
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
        return $this->belongsToMany(Platform::class);
    }

    /**
     * Produkt może mieć przypisanych wiele kategorii
     */
    public function categories()
    {
        return $this->belongsToMany(Category::class);
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
                return config('filesystems.images_dir') . '' . $value;
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
}
