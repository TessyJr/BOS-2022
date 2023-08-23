<?php

namespace App\Models;

use App\Models\Group\GroupDetail;
use App\Notifications\ResetPassword;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Notifications\ResetPasswordNotification;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'fullName',
        'gender',
        'birthDate',
        'placeBirth',
        'domicile',
        'address',
        'line_id',
        'whatsapp',
        'instagram',
        'agama',
        //Step 2
        'nim',
        'campus_region',
        'faculty',
        'major',
        'join_bl',
        'batch',
        //Step 3
        'launching_schedule',
        'lnt_course',
        'trial_class',
        //Step 4
        'email',
        'password',
        //Payment
        // 0 - Belum submit
        // 1 - Verifikasi
        // 2 - Error
        // 3 - Berhasil yeey
        'payment_type',
        'has_group',
        'payment_pic',
        'payment_status',
        //Re-register
        'reregister_status',
        'reregister_schedule',
        'surat_status',
        'bnccID',
        "registration_source",
        'binus_email',
        //Role
        'role',
        'status',
        'timestamp'
    ];

    public function member(){
        return $this->hasOne(Member::class,'user_id');
    }

    public function member2(){
        return $this->hasOne(Member2::class,'user_id');
    }

    public function groupDetail(){
        return $this->hasOne(GroupDetail::class,'user_id');
    }

    public function registrationSource(){
        return $this->hasMany(RegistrationSource::class,'user_id');
    }


    public function scopeFilter($query, array $filters){
        //Search
        $query->when($filters['search'] ?? false, function($query, $search) {
            return $query
                ->where('fullName','like','%' .$search. '%')
                ->orWhere('nim','like',$search.'%')
                ->orWhereHas('groupDetail', function($query) use ($search){
                    $query
                        ->whereHas('group', function($query) use ($search){
                            $query
                                ->where('group_token','=',$search);
                        });
                });
        });

        //Filter Region
        $query->when($filters['region'] ?? false, function($query, $region) {
            return $query
                ->where('campus_region', 'like', $region);
        });

        //Filter Status
        $query->when($filters['status'] ?? false, function($query, $status) {
            return $query
                ->where('payment_status', 'like', $status)
                ->orWhere('payment_type','like',$status);
        });
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
        'register_from' => 'array'
    ];

    public function sendPasswordResetNotification($token)
    {
        $url = route('password.reset', $token) . "?email=". $this->getEmailForPasswordReset();
        $this->notify(new ResetPassword($url));
    }
}
