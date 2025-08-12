<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'author',
        'category_id',
        'year',
    ];

    // Relasi: Book milik satu Category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Relasi: Book punya banyak Borrows
    public function borrows()
    {
        return $this->hasMany(Borrow::class);
    }
}
