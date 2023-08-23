<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'reregister_schedule',
        'bnccid',
        'email_binus',
        'ktp_pic',
        'fyp_pic',
        'surat'
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    // Not Tested yet
    public function scopeFilter($query, array $filters){
        //Search
        $query->when($filters['search'] ?? false, function($query, $search) {
            return $query->whereHas('user', function($query) use ($search){
                $query
                    ->where('fullName','like','%'.$search.'%')
                    ->orWhere('nim','like',$search.'%');
            });
        });

        //Filter Region
        $query->when($filters['region'] ?? false, function($query, $region) {
            return $query->whereHas('user', function($query) use ($region){
                $query->where('campus_region','like',$region);
            });
        });
    }
}
