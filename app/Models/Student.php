<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Student extends Authenticatable
{
    use HasFactory;
    protected $fillable = [
        'name',
        'dob',
        'present_address',
        'permanent_address',
        'image',
        'email',
        'password',
        'group_id',
        'section_id',
        'parent_id',
        'rollno'
    ];
    protected $guard='student';

    public function parent()
    {
        return $this->belongsTo(Parents::class, 'parent_id');
    }

    public function group()
    {
        return $this->belongsTo(Group::class, 'group_id');
    }

    public function section()
    {
        return $this->belongsTo(Section::class, 'section_id');
    }

    public function payments()
    {
        return $this->hasMany(StudentPayment::class);
    }
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
}
