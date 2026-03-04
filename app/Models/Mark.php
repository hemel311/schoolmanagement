<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mark extends Model
{
    use HasFactory;
    protected $fillable = [
        'student_id',
        'subject_id',
        'exam_type',
        'mark',
        'year',
    ];

    /* ---------------- Relationships ---------------- */

    // Mark belongs to Student
    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    // Mark belongs to Subject
    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

}
