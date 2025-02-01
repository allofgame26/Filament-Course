<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class student_has_class extends Model
{
    use HasFactory;

    protected $table = 'student_has_classes';

    protected $fillable = [
        'student_id',
        'homerooms_id',
        'periodes_id',
        'is_open',
    ];

    protected $guarded = [];

    public function student(){
        return $this->belongsTo(student::class, 'student_id', 'id');
    }

    public function homerooms(){
        return $this->belongsTo(home_room::class,'homerooms_id','id');
    }

    public function periodes(){
        return $this->belongsTo(Periode::class,'periodes_id','id');
    }
}
