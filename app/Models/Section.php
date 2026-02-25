<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;

    protected $fillable=['class_id','section','class_teacher_id'];

    public function group()
    {
        return $this->belongsTo(Group::class,'class_id');
    }

    public function classTeacher()
    {
        return $this->belongsTo(Teacher::class, 'class_teacher_id');
    }
}
