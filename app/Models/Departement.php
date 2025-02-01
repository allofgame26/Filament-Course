<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departement extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $fillable = [
        'name_departement',
        'slug',
        'description',
    ];

    protected $table = 'departements';
}
