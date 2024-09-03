<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Employee;
use App\Models\Attendance;
use Carbon\Carbon;

class AttendanceComponent extends Component
{
    public $employees;
    public $date;
    public $attendance = [];

    public function mount()
    {
        $this->employees = Employee::all();
        
        $this->date = Carbon::today()->toDateString();
        foreach ($this->employees as $employee) {
            $this->attendance[$employee->id] = [
                'status' => 'present',
                'check_in' => null,
                'check_out' => null,
                'total_hours' => 0
            ];
        }
    }

    public function saveAttendance()
    {
        foreach ($this->attendance as $employeeId => $details) {
            $attendance = Attendance::updateOrCreate(
                [
                    'employee_id' => $employeeId,
                    'date' => $this->date,
                ],
                [
                    'status' => $details['status'],
                    'check_in' => $details['check_in'],
                    'check_out' => $details['check_out']
                ]
            );

            // Calculate total hours
            if ($details['check_in'] && $details['check_out']) {
                $checkIn = Carbon::parse($details['check_in']);
                $checkOut = Carbon::parse($details['check_out']);
                $attendance->total_hours = $checkOut->diffInHours($checkIn);
                $attendance->save();
            }
        }

        session()->flash('message', 'Attendance saved successfully.');
    }

    public function render()
    {
        return view('livewire.attendance-component');
    }
}