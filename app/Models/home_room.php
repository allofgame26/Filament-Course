<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class home_room extends Model
{
    use HasFactory;

    protected $table = 'home_rooms';

    protected $guarded = [];

    protected $fillable = [
        'teachers_id',
        'classrooms_id',
        'periodes_id',
        'is_open',
    ];

    public function teachers(){
        return $this->belongsTo(Teacher::class, 'teachers_id', 'id');
    }

    public function classrooms(){
        return $this->belongsTo(Classroom::class,'classrooms_id','id');
    }

    public function periodes(){
        return $this->belongsTo(Periode::class,'periodes_id','id');
    }

    public function hasroom(){
        return $this->hasMany(student_has_class::class,'homerooms_id','id');
    }
    
}
