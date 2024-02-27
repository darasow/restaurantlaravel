<?php

namespace App\Models;
use App\Models\Categorie;
use App\Models\User;
use App\Models\Table;
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

    public function tables()
    {
        return $this->hasMany(Table::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}

