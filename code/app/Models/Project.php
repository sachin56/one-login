<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $fillable=[
        'id',
        'master_no',
        'name',
        'address',
        'tele_no',
        'Is_active'
    ];
}
