<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PanierClient extends Model
{
    use HasFactory;
    protected $fillable = [
        'element_id',
        'table_id',
        'montant',
        'quantite',
        'estCommander',
    ];

   

    
}
