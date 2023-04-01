<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\hasMany;

class Category extends Model
{
    use HasFactory;

    protected $table = "category";

    public function books(){
        return $this->hasMany(Books::class);
    }
}
