<?php

namespace App\Models\tentor;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class TentorVerification extends Authenticatable
{
    protected $table = 'tentor-verification';
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'id',
        'ktp_file',
        'ijazah_file',
        'transkip_file',
        'ktp_status',
        'ijazah_status',
        'transkip_status',
        'ktp_decline_reason',
        'ijazah_decline_reason',
        'transkip_decline_reason',
        'verification_status',
    ];
}
