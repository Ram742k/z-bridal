<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BridalBooking extends Model
{
    use HasFactory;

    protected $fillable = [
        'bridal_name', 'cell_no1', 'cell_no2', 'address', 'function',
        'function_date', 'time', 'place', 'makeup', 'side_makeup', 'jewalls', 
        'flowers', 'total_amount', 'advance_amount', 'balance'
    ];
    protected $casts = [
        'function_date' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}
