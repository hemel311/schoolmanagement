<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class onlineClass extends Model
{
    use HasFactory;
    protected $fillable=[
        'teacher_id',
        'group_id', 'section_id','subject','time','platform','link'
    ];
    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }
    public function group()
    {
        return $this->belongsTo(Group::class);
    }
    public function section()
    {
        return $this->belongsTo(Section::class);
    }
}
