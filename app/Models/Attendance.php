<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Attendance extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_id',
        'date',
        'status',
        'check_in',
        'check_out',
        'total_hours'
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function calculateTotalHours()
    {
        if ($this->check_in && $this->check_out) {
            $checkIn = Carbon::parse($this->check_in);
            $checkOut = Carbon::parse($this->check_out);
            $this->total_hours = $checkOut->diffInHours($checkIn);
            $this->save();
        }
    }
}