<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class System_users extends Model
{
    use HasFactory;
    protected $fillable = [
        'sys_id',
        'uid',
    ];
}
