<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Employee;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class EmployeeList extends Component
{
    public $editing = false; // Flag to track if editing mode is active
    public $viewing = false; // Flag to track if viewing mode is active
    public $employeeId; // Store the ID of the employee being edited or viewed
    public $employees;
    public $first_name;
    public $last_name;
    public $birthday;
    public $gender;
    public $email;
    public $phone;
    public $address;
    public $address_number;
    public $city;
    public $state;
    public $zip;
    public $emergency_contact_name;
    public $emergency_contact_number;
    public $years_of_experience;
    public $position;
    public $date_of_joining;

    protected $rules = [
        'first_name' => 'required|string|max:255',
        'last_name' => 'required|string|max:255',
        'birthday' => 'required|date',
        'gender' => 'required|string|max:10',
        'email' => 'required|email|max:255',
        'phone' => 'required|string|max:20',
        'address' => 'required|string|max:255',
        'address_number' => 'required|string|max:10',
        'city' => 'required|string|max:255',
        'state' => 'required|string|max:255',
        'zip' => 'required|string|max:10',
        'emergency_contact_name' => 'required|string|max:255',
        'emergency_contact_number' => 'required|string|max:20',
        'years_of_experience' => 'required|integer|min:0',
        'position' => 'required|string|max:255',
        'date_of_joining' => 'required|date',
    ];

    public function render()
    {
        $this->employees = Employee::all();
        return view('livewire.employee-list', ['employees' => $this->employees]);
    }

    public function edit($id)
    {
        $employee = Employee::findOrFail($id);
        
        // Populate form fields with employee data
        $this->employeeId = $id;
        $this->first_name = $employee->first_name;
        $this->last_name = $employee->last_name;
        $this->birthday = $employee->birthday;
        $this->gender = $employee->gender;
        $this->email = $employee->email;
        $this->phone = $employee->phone;
        $this->address = $employee->address;
        $this->address_number = $employee->address_number;
        $this->city = $employee->city;
        $this->state = $employee->state;
        $this->zip = $employee->zip;
        $this->emergency_contact_name = $employee->emergency_contact_name;
        $this->emergency_contact_number = $employee->emergency_contact_number;
        $this->years_of_experience = $employee->years_of_experience;
        $this->position = $employee->position;
        $this->date_of_joining = $employee->date_of_joining;

        $this->editing = true; // Enable editing mode
    }


    public function view($id)
    {
        $this->employeeId = $id;
        $this->viewing = true; 
    }
    public function update()
    {
        $this->validate();

        // Update the employee record
        $employee = Employee::findOrFail($this->employeeId);
        $employee->update([
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'birthday' => $this->birthday,
            'gender' => $this->gender,
            'email' => $this->email,
            'phone' => $this->phone,
            'address' => $this->address,
            'address_number' => $this->address_number,
            'city' => $this->city,
            'state' => $this->state,
            'zip' => $this->zip,
            'emergency_contact_name' => $this->emergency_contact_name,
            'emergency_contact_number' => $this->emergency_contact_number,
            'years_of_experience' => $this->years_of_experience,
            'position' => $this->position,
            'date_of_joining' => $this->date_of_joining,
        ]);

        $this->resetForm();
        $this->editing = false; // Disable editing mode

        session()->flash('message', 'Employee updated successfully!');
    }

   

    public function cancel()
    {
        $this->resetForm();
        $this->resetFlags(); // Reset both editing and viewing flags
    }

    private function resetFlags()
    {
        $this->editing = false;
        $this->viewing = false;
        $this->employeeId = null;
    }

    private function resetForm()
    {
        // Reset all form fields
        $this->first_name = '';
        $this->last_name = '';
        $this->birthday = '';
        $this->gender = '';
        $this->email = '';
        $this->phone = '';
        $this->address = '';
        $this->address_number = '';
        $this->city = '';
        $this->state = '';
        $this->zip = '';
        $this->emergency_contact_name = '';
        $this->emergency_contact_number = '';
        $this->years_of_experience = '';
        $this->position = '';
        $this->date_of_joining = '';
    }

    public function delete($id)
    {
        // Handle logic for deleting an employee
        $employee = Employee::findOrFail($id);
        $employee->delete();
        session()->flash('message', 'Employee deleted successfully.');
    }
}
