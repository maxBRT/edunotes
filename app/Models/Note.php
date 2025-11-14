<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Laravel\Scout\Searchable;

class Note extends Model
{
    use HasFactory, Searchable;

    protected $fillable = [
        'title',
        'content',
        'school_class_id',
    ];

    public function toSearchableArray()
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
        ];
    }

    public function schoolClass()
    {
        return $this->belongsTo(SchoolClass::class);
    }

    public function user()
    {
        return $this->hasOneThrough(
            User::class,
            SchoolClass::class,
            'id',
            'id',
            'school_class_id',
            'user_id'
        );
    }

    public function getContentHtmlAttribute(): ?string
    {
        $content = $this->attributes['content'] ?? null;

        if ($content === null) {
            return null;
        }

        return Str::markdown($content);
    }
}
