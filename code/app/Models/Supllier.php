<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supllier extends Model
{
    use HasFactory;

    protected $fillable=[
        'id',
        'bp_no',
        'name',
        'address',
        'email',
        'tele_no',
        'Is_active'
    ];
}
