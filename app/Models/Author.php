<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\hasMany;


class Author extends Model
{
    use HasFactory;

    protected $table = "author";

    public function books(){
        return $this->hasMany(Books::class);
    }
}
