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
        'username',
        'email',
        'password',
        'role',
        'designation',
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


        if (auth()->user()->role == "CSB 61" || auth()->user()->role == "AOTR MZD")
        {
            return $districts = [
                'Muzaffarabad',
                'Hattian Bala',
                'Neelum',
                'Poonch',
                'Bagh',
                'Haveli',
                'Sudhnati'];
        }
        elseif(auth()->user()->role == "CSB 64" || auth()->user()->role == "AOTR MPR")
        {
            return $districts = [
                'Mirpur',
                'Bhimber',
                'Kotli',];
        }
        elseif(auth()->user()->role == "Sector HQ" || auth()->user()->role == "admin")
        {
            return $districts = [
                'Muzaffarabad',
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


    }


    public static function region_court_case(): array
    {
        //lreturn $region_court_case = ['AOTR MZD', 'AOTR MPR'];

        if (auth()->user()->role == "CSB 61" || auth()->user()->role == "AOTR MZD")
        {
            return $region_court_case = ['AOTR MZD'];
        }
        elseif(auth()->user()->role == "CSB 64" || auth()->user()->role == "AOTR MPR")
        {
            return $region_court_case = ['AOTR MPR'];
        }
        elseif(auth()->user()->role == "Sector HQ" || auth()->user()->role == "admin")
        {
            return $region_court_case = ['AOTR MZD', 'AOTR MPR'];
        }


    }

    public static function btn_name(): array
    {
        if (auth()->user()->role == "CSB 61" || auth()->user()->role == "AOTR MZD")
        {
            return ['61 CSB MZD'];
        }
        elseif(auth()->user()->role == "CSB 64" || auth()->user()->role == "AOTR MPR")
        {
            return ['64 CSB MPR'];
        }
        elseif(auth()->user()->role == "Sector HQ" || auth()->user()->role == "admin")
        {
            return ['61 CSB MZD', '64 CSB MPR'];
        }
    }


    public static function company_name(): array
    {

        if (auth()->user()->role == "CSB 61" || auth()->user()->role == "AOTR MZD")
        {
            return [
                '423 CSC Muzaffarabad',
                '426 CSC Bagh',
                '429 CSC Rawalakot',
            ];
        } elseif(auth()->user()->role == "CSB 64" || auth()->user()->role == "AOTR MPR")
        {
            return [
                '424 CSC Mirpur',
                '428 CSC Kotli',
                '432 CSC Bhimber',
            ];
        }elseif(auth()->user()->role == "Sector HQ" || auth()->user()->role == "admin")
        {
            return [
                '423 CSC Muzaffarabad',
                '426 CSC Bagh',
                '429 CSC Rawalakot',
                '424 CSC Mirpur',
                '428 CSC Kotli',
                '432 CSC Bhimber',
            ];
        }
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
                'Rs. 550 S Gold',
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
                'Platinum',
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


    public static function role_type($role): array
    {
        if ($role == '') {
            return ['None'];
        }
        elseif ($role == 'Sector HQ') {
            return [
                'Sector Commander',
                'G2',
                'G3',
                'ZSM',
                'Clerk',
            ];
        }

        elseif ($role == 'CSB 61') {
            return [
                'CO',
                '2iC',
                'OC 423',
                'OC 426',
                'OC 429',
                'RSM',
                'Clerk',
            ];
        }

        elseif ($role == 'AOTR MZD') {
            return [
                'AOTR MZD',
                'Data Officer MZD',
                'Clerk',
            ];
        }

        elseif ($role == 'CSB 64') {
            return [
                'CO',
                '2iC',
                'OC 424',
                'OC 428',
                'OC 432',
                'RSM',
                'Clerk',
            ];
        }

        elseif ($role == 'AOTR MPR') {
            return [
                'AOTR MPR',
                'Data Officer MZD',
                'Clerk',
            ];
        }


        elseif ($role == 'admin') {
            return [
                'Admin',
            ];
        }
    }


    public static function location(): array
    {
        if (auth()->user()->role == "CSB 61" || auth()->user()->role == "AOTR MZD")
        {
            return [
                'Neelum Comm Mzd',
                'Ahmed Traders Bagh',
                'Rawalakot Comm Gp',
            ];
        }
        elseif(auth()->user()->role == "CSB 64" || auth()->user()->role == "AOTR MPR")
        {
            return [
                'Jarral MPR',
                'KTI',
                'Fahad BHR',
                'Baig KRT',
                'Dadyal',
            ];
        }
        elseif(auth()->user()->role == "Sector HQ" || auth()->user()->role == "admin")
        {
            return [
                'Neelum Comm Mzd',
                'Ahmed Traders Bagh',
                'Rawalakot Comm Gp',
                'Jarral MPR',
                'KTI',
                'Fahad BHR',
            ];
        }
    }


    public static function company_name_without_code(): array
    {

        if (auth()->user()->role == "CSB 61" || auth()->user()->role == "AOTR MZD")
        {
            return [
                'Muzaffarabad',
                'Bagh',
                'Rawalakot',
            ];
        } elseif(auth()->user()->role == "CSB 64" || auth()->user()->role == "AOTR MPR")
        {
            return [
                'Mirpur',
                'Kotli',
                'Bhimber',
            ];
        }elseif(auth()->user()->role == "Sector HQ" || auth()->user()->role == "admin")
        {
            return [
                'Muzaffarabad',
                'Bagh',
                'Rawalakot',
                'Mirpur',
                'Kotli',
                'Bhimber',
            ];
        }
    }
}
