<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegistrationSource extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'source'
    ];

    protected $table = 'registration_source';

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
}
