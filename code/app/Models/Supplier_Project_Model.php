<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier_Project_Model extends Model
{
    use HasFactory;
    protected $fillable=[
         'id',
         'model',
         'model_id',
         'system_id'
    ];
}
