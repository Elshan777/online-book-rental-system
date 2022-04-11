<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Models\Genre;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [ 'title', 'authors', 'description', 'released_at', 'pages',
     'image_url', 'language_code', 'isbn', 'in_stock',  ];
    
    /**
     * The roles that belong to the Book
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function genres(): BelongsToMany
    {
        return $this->belongsToMany(Genre::class, 'genre_book');
    }

}
