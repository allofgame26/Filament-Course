<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $fillable = [
        'name',
        'nip',
        'address',
        'profile'
    ];

    protected $table = 'teachers';

    public function classroom(){
        return $this->hasMany(home_room::class,'teachers_id','id');
    }
    
}
