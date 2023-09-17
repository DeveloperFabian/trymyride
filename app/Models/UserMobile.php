<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class UserMobile extends Model 
{
    use HasFactory, HasApiTokens;

    protected $table = 'user_mobiles';

    protected $fillable = [
        'name',
        'email',
        'password',
        'state_id'
    ];

    public function state()
    {
        return $this->belongsTo(Status::class);
    }
}
