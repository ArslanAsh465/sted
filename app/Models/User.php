<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'email',
        'username',
        'password',
        'role',
        'is_verified'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // Relations
    public function institute()
    {
        return $this->hasOne(InstituteProfile::class, 'user_id');
    }

    public function teacher()
    {
        return $this->hasOne(TeacherProfile::class, 'user_id');
    }

    public function parent()
    {
        return $this->hasOne(ParentProfile::class, 'user_id');
    }

    public function student()
    {
        return $this->hasOne(StudentProfile::class, 'user_id');
    }

    public function news()
    {
        return $this->hasMany(News::class, 'user_id');
    }

    public function galleries()
    {
        return $this->hasMany(Gallery::class, 'user_id');
    }

    public function downloads()
    {
        return $this->hasMany(Download::class, 'user_id');
    }
}
