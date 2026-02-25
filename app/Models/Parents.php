<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Parents extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $fillable=['father_name','mother_name','parent_email','parent_password'];
    protected $guard='parents';

    public function students()
    {
        return $this->hasMany(Student::class, 'parent_id');
    }
    public function getAuthIdentifierName()
    {
        return 'parent_email';
    }
    public function getAuthPassword()
    {
        return $this->parent_password;
    }
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'parent_password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'parent_password' => 'hashed',
    ];

}
