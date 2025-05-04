<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Task extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'due_date', 'created_by'];

    // Guru yang membuat tugas
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    // Siswa yang menerima tugas
    public function users()
    {
        return $this->belongsToMany(User::class)
                    ->withPivot(['is_completed', 'completed_at'])
                    ->withTimestamps();
    }
}