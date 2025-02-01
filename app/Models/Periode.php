<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Periode extends Model
{
    use HasFactory;
    
    protected $guarded = [];

    protected $fillable = [
        'name',
    ];

    protected $table = 'periodes';

    public function home_rooms(){
        return $this->hasMany(home_room::class,'periodes_id','id');
    }

    public function hasroom(){
        return $this->hasMany(student_has_class::class, 'periodes_id', 'id');
    }
}
