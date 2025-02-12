<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;

    protected $fillable = [
        'expense_date',
        'expense_time',
        'amount',
        'party',
        'remarks',
        'attachment',
        'category',
        'payment_mode',
    ];
}
