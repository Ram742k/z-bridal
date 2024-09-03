<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Employee;

class EmployeeDetails extends Component
{
    public $employee;

    public function mount($id)
    {
        // Load the employee details based on ID
        $this->employee = Employee::findOrFail($id);
    }

    public function render()
    {
        return view('livewire.employee-details', [
            'employee' => $this->employee,
        ]);
    }
}
