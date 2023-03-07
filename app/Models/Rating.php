<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Rating extends Model
{
    use HasFactory;

    protected $table = "rating";
    protected $fillable = ['rating','books_id'];

    public function books(): BelongsTo
    {
        return $this->belongsTo(Books::class,'books_id','id');
    }
}

?>