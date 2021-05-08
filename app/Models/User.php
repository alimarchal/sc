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
        return $region_court_case = ['AOTR MZD', 'AOTR MPR'];
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
                '424 CSC',
                '428 CSC',
                '432 CSC',
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
            'Microwave/Fiber',
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


    public static function type_of_exchange(): array
    {
        return [
            'MSU',
            'RSU',
            'RSM',
        ];
    }


    public static function line_of_csc(): array
    {
        return [
            'Muzaffarabad' => [
                'Dirkoot',
                'Fwd Kahuta',
                'Rawalakot',
                'Paniola',
                'Plandri',
                'Hajira',
                'Bandi Abbas Pur',
                'MZD Old',
                'MZD New',
                'Hattian',
                'Kel',
                'Athmuqam',
                'Bagh',
            ],

            'Mirpur' => [
                'Chaksawari',
                'Dudyal',
                'Islamgarh',
                'Jatlan',
                'Mirpur',
                'Barnala',
                'Bhimber',
                'Samahni',
                'Khuiratta',
                'Kotli',
                'Nakial',
                'Nar',
                'Sehnsa',
            ]
        ];
    }


    public static function svsc(): array
    {
        return [
            'SPhone',
            'GSM',
            'CDMA',
            'SNet',
        ];
    }

    public static function cards_denom(): array
    {
        return $cards = [
            'SCOM',
            'CDMA',
            'PPCCs',
            'SCOM Sims',
            'UBPs',
            'S Net DSL',
        ];
    }

    public static function denom_type($type): array
    {
        if ($type == '') {
            return [
                'None',
            ];
        }
        if ($type == 'SCOM') {
            return [
                'Rs. 50',
                'Rs. 100',
                'Rs. 200',
                'Rs. 300',
                'Rs. 300 Super',
                'Rs. 349 Super',
                'Rs. 500',
                'Rs. 500 Super',
                'Rs. 549 S Gold',
                'Rs. 1000',
            ];
        } elseif ($type == 'CDMA') {
            return [
                'Rs. 100',
                'Rs. 300',
                '249 Unit',
                '499 Unit',
                '1499 Unit',
                'Hourly Rs. 50',
                'Hourly Rs. 100',
                'Hourly Rs. 300',
            ];
        } elseif ($type == 'PPCCs') {
            return [
                'Rs. 50',
                'Rs. 100',
                'Rs. 200',
                'Rs. 300',
            ];
        } elseif ($type == 'SCOM Sims') {
            return [
                'SIMs (Samsung Chip)',
                'Golden',
                'SIMs 4G',
                'Blank 4G',
                'Silver',
                'Post Paid',
            ];
        } elseif ($type == 'UBPs') {
            return [
                'Rs. 50',
                'Rs. 100',
                'Rs. 200',
                'Rs. 300',
                'Rs. 500',
                'Rs. 1000',
            ];
        } elseif ($type == 'S Net DSL') {
            return [
                'Rs. 100',
                'Rs. 500',
                'Rs. 1000',
            ];
        }
    }

    public static function card_type(): array
    {
        return [
            'SCOM CARDS',
            'S-Load',
        ];
    }

}
