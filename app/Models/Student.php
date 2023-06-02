<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{
    use HasFactory, SoftDeletes;

    // protected $table='students';
    // protected $primaryKey = 'flight_id';
    protected $fillable = ['name', 'gender', 'nis', 'class_id', 'image'];

    
    public function class1()
    {
        return $this->belongsTo(ClassRoom::class, 'class_id', 'id');
    }

    
    public function ekskuls()
    {
        return $this->belongsToMany(Ekskul::class, 'student_ekskul', 'student_id', 'ekskul_id');
    }

}
