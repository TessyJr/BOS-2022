<?php

namespace App\Models\Group;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupDetail extends Model
{
    use HasFactory;

    protected $table = "group_details";

    protected $fillable = [
        'group_id',
        'user_id',
        'payment'
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function group(){
        return $this->belongsTo(Group::class, 'group_id');
    }
}
