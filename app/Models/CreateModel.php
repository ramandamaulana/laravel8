<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CreateModel extends Model
{
    use HasFactory;

    //Data Table Latihan

    protected $table = "users";
    protected $fillable = [
        'id',
        'name',
        'email',
        'email_verified_at',
        'password',
        'google_id'
    ];
  
}
