<?php

namespace App\Models\Group;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    protected $table = "groups";

    protected $fillable = [
        'group_token'
    ];

    public function groupDetail(){
        return $this->hasMany(GroupDetail::class,'group_id');
    }
}
