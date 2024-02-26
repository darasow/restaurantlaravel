<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Element;

class categorie extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'libelle',
        'image',
        'restaurant_id',
    ];

    public function elements()
    {
        return $this->hasMany(Element::class);
    }
}
