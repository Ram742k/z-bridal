<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads; // Import WithFileUploads trait
use App\Models\Employee;

class Employeeadd extends Component
{
    use WithFileUploads;

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
    public $profile_image;
    public $id_proof;

    protected $rules = [
        'first_name' => 'required|string|max:255',
        'last_name' => 'required|string|max:255',
        'birthday' => 'required|date',
        'gender' => 'required|string|max:10',
        'email' => 'required|email|max:255|unique:employees,email',
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
        'profile_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'id_proof' => 'required|file|mimes:pdf|max:2048',
    ];

    public function submit()
    {
        $this->validate();

        // Handle file uploads
        $profileImagePath = $this->profile_image->store('profile_images', 'public');
        $idProofPath = $this->id_proof->store('id_proofs', 'public');

        Employee::create([
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
            'profile_image' => $profileImagePath,
            'id_proof' => $idProofPath,
        ]);

        $this->resetForm();

        session()->flash('message', 'Employee registered successfully!');
    }

    public function resetForm()
    {
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
        $this->profile_image = null;
        $this->id_proof = null;
    }

    public function render()
    {
        return view('livewire.employeeadd');
    }
}
