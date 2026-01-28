<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'status',
        'priority',
        'due_date',
    ];

    protected $casts = [
        'due_date' => 'date',
    ];

    public function getStatusBadgeClass(): string
    {
        return match($this->status) {
            'todo' => 'bg-secondary',
            'in_progress' => 'bg-warning',
            'done' => 'bg-success',
            default => 'bg-secondary',
        };
    }

    public function getPriorityBadgeClass(): string
    {
        return match($this->priority) {
            'low' => 'bg-info',
            'medium' => 'bg-primary',
            'high' => 'bg-danger',
            default => 'bg-primary',
        };
    }
}
