<?php

namespace App\Models\tentor;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class FileVerification extends Authenticatable
{
    protected $table = 'tentor-verification-file';
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
        'status',
    ];
}
