<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Element;
use App\Models\Restaurant;

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

    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }
}
