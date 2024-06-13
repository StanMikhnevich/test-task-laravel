<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\belongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [
        'id'
    ];

    protected $casts = [
        'published_at' => 'datetime',
    ];

    public const IMAGE_PATH = 'images/books';

    public function getImagePathAttribute(): string
    {
        return asset('storage/' . self::IMAGE_PATH . '/' . $this->image);
    }

    public function authors(): belongsToMany
    {
        return $this->belongsToMany(Author::class);
    }

    public function deleteAll()
    {
        $this->authors()->detach();
        $this->delete();
    }
}