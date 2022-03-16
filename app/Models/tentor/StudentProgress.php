<?php

namespace App\Models\tentor;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class StudentProgress extends Authenticatable
{
    protected $table = 'students_progress';
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'tentored_student_id',
        'learning_progression',
        'feedback',
        'study_method',
        'study_target',
        'month',
        'status',
    ];
}
