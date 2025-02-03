<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $fillable = [
        'nis',
        'name',
        'gender',
        'birthday',
        'religion',
        'contact',
        'profile'
    ];

    protected $table = 'students';

    public function hasclass(){
        return $this->hasMany(student_has_class::class,'student_id','id');
    }
}
