<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as IAuditable;

class Shop extends Model implements IAuditable
{
    use HasFactory, Auditable;

    protected $fillable = [
        'name',
        'address',
        'latitude',
        'longitude',
    ];
}
