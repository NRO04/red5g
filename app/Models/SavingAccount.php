<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SavingAccount extends Model
{
    use HasFactory;
    protected $fillable = [
        'client_id',
        'account_number',
        'balance',
        'opening_date',
        'city',
        'country',
        'is_active',
    ];
}
