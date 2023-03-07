<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\hasMany;


class Books extends Model
{
    use HasFactory;

    protected $table = "books";

    public function category(): BelongsTo
    {
        return $this->belongsTo('App\Models\Category','category_id','id');
    }
    
    public function author(): BelongsTo
    {
        return $this->belongsTo(Author::class,'author_id','id');
    }

    public function rating(){
        return $this->hasMany(Rating::class);
    }

}
