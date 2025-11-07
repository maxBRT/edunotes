<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SchoolClass extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'teacher_name',
        'teacher_email',
        'class_website',
    ];

    public function notes()
    {
        return $this->hasMany(Notes::class);
    }
}
