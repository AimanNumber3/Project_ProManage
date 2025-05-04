<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = ['name', 'email', 'password'];

    // Relasi ke roles
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    // Relasi ke tugas yang dibuat (jika dosen)
    public function createdTasks()
    {
        return $this->hasMany(Task::class, 'created_by');
    }

    // Relasi ke tugas yang dikerjakan (jika mahasiswa)
    public function tasks()
    {
        return $this->belongsToMany(Task::class)
                    ->withPivot(['is_completed', 'completed_at'])
                    ->withTimestamps();
    }

    // Relasi ke kalender pribadi
    public function calendars()
    {
        return $this->hasMany(Kalender::class);
    }

    // Cek apakah user punya role tertentu
    public function hasRole($role)
    {
        return $this->roles()->where('name', $role)->exists();
    }
}