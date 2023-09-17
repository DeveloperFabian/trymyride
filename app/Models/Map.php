<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Map extends Model
{
    use HasFactory;

    protected $table = 'states';

    protected $fillable = [
        'name',
        'description',
        'location'
    ];
}
