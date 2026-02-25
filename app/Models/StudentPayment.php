<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentPayment extends Model
{
    use HasFactory;
    protected $fillable = [
        'student_id',
        'month',
        'total_amount',
        'paid_amount',
        'due_amount',
        'status'
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
