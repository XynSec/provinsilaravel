<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kotas extends Model
{
    // use HasFactory;
    protected $fillable = [
        'kota','provinsi'
      ];
}
