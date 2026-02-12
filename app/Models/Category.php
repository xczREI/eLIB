<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    // Allows mass assignment for the category name
    protected $fillable = ['name'];

    /**
     * Define the relationship to Books.
     * This allows $category->books to work.
     */
    public function books(): HasMany
    {
        return $this->hasMany(Book::class);
    }
}