<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $fillable = [
        'name',
        'slug',
    ];

    protected $table = 'classrooms';

    public function home_rooms(){
        return $this->hasMany(home_room::class,'classrooms_id','id');
    }
}
