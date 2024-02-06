<?php

namespace App\Models;

use App\Classes\Helper;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Support\Facades\Auth;
// use Laravel\Sanctum\HasApiTokens;
use Laravel\Passport\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles, LogsActivity;

    protected $guard = 'api';

    public const STATUS_ACTIVE = 0;
    public const STATUS_INACTIVE = 1;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    // public function getActivitylogOptions(): LogOptions
    // {
    //     return LogOptions::defaults()
    //     ->logOnly(['name', 'text']);
    // }

    protected $fillable = [
        'name', 'parent_id', 'license_id', 'plan_id', 'email', 'phone', 'image', 'address', 'password', 'otp', 'about', 'device_type', 'date', 'referral_code', 'dash_pass', 'contact', 'state', 'partner', 'referral_url', 'referring_url', 'utm_source', 'utm_keyword', 'utm_campaign', 'utm_medium', 'device', 'last_login', 'app_version', 'device_count', 'app_user', 'face_verification', 'device_token', 'verified_by', 'social_provider', 'social_token', 'social_id', 'status' , 'is_deactivate', 'email_verified_at'
    ];

    protected static $logAttributes = ['name', 'parent_id', 'license_id', 'plan_id', 'email', 'phone', 'image', 'address','password', 'otp', 'about', 'device_type', 'date', 'referral_code', 'dash_pass', 'contact', 'state', 'partner', 'referral_url', 'referring_url', 'utm_source', 'utm_keyword', 'utm_campaign', 'utm_medium', 'device', 'last_login', 'app_version', 'device_count', 'app_user', 'face_verification', 'device_token', 'verified_by', 'social_provider', 'social_token', 'social_id', 'status' , 'is_deactivate', 'email_verified_at'];
    protected static $logName = 'User';
    protected static $logOnlyDirty = true;

    public function license()
    {
        return $this->belongsTo(License::class, 'license_id');
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
