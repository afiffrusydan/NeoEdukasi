<?php

namespace App\Models\tentor;

use Illuminate\Foundation\Auth\User as Authenticatable;

class SalarySubmission extends Authenticatable
{
    protected $table = 'salary-submission';
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'tentored_student_id',
        'month',
        'meet_hours',
        'extra_meet_hours',
        'documentation',
        'attendance',
        'add_cost',
        'proof',
        'total',
        'status',
    ];
}
