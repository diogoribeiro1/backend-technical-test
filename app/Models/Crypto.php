<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Crypto extends Model
{
    use HasFactory;

//    protected $table = 'cryptos';

    public $timestamps = false;

    protected $fillable = [
        'coin',
        'price',
        'date',
    ];

}
