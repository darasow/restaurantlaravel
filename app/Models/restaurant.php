<?php

namespace App\Models;
use App\Models\Categorie;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'avatar',
        'reference',
        'user_id',
    ];

    public function categories()
    {
        return $this->hasMany(Categorie::class);
    }
}

