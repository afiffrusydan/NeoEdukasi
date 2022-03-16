<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class TentorVerification extends Model
{
    protected $table = 'tentor-verification';
    protected $guard = 'admin';
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'id',
        'ktp_status',
        'ktp_decline_reason',
        'ijazah_status',
        'ijazah_decline_reason',
        'transkip_status',
        'transkip_decline_reason',
        'verification_status',
    ];
}
