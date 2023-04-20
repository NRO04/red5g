<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    protected $fillable = [
        'names',
        'document_number',
        'email',
        'phone',
        'address',
        'city',
        'age',
        'profession',
        'city',
    ];
}
