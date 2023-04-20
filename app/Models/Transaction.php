<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $fillable = [
        'client_id',
        'saving_account_id',
        'transaction_date',
        'business_name',
        'current_balance',
        'final_balance',
        'transaction_status',
    ];
}
