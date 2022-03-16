<?php

namespace App\Models\tentor;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class TentorApplication extends Authenticatable
{
    protected $table = 'tentors-application';
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'id',
        'tentor_id',
        'vacancy_id',
        'status',
    ];
}
