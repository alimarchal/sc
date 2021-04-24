<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'battalion',
        'district',
        'section',
        'user_type',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public static function district(): array
    {
        return $districts = ['Muzaffarabad',
            'Hattian Bala',
            'Neelum',
            'Mirpur',
            'Bhimber',
            'Kotli',
            'Poonch',
            'Bagh',
            'Haveli',
            'Sudhnati'];
    }


    public static function region_court_case(): array
    {
        return $region_court_case = ['AOTR MZD', 'AOTR MIRPUR'];
    }

    public static function btn_name(): array
    {
        return ['61 CSB MZD', '64 CSB MPR'];
    }


    public static function company_name(): array
    {
        return [
            '423 CSC',
            '426 CSC',
            '429 CSC',
        ];
    }


    public static function service_type(): array
    {
        return [
            '2G',
            '3G',
            '4G',
            '2G/3G',
            '2G/3G/4G',
            '3G/4G',
        ];
    }

    public static function connectivity(): array
    {
        return [
            'Microwave',
            'Fiber',
        ];
    }

    public static function manned_unmanned(): array
    {
        return [
            'Manned',
            'UnManned',
        ];
    }

    public static function cards(): array
    {
        return $cards = [
            'SCOM',
            'CDMA',
            'PPCCs',
            'DSL',
            'SIMs',
        ];
    }

    public static function connectionType(): array
    {
        return $connectionType = [
            'PSTN EXCH SITES',
            'GSM BTS SITES',
            'WILL BTS SITES',
        ];
    }
}
