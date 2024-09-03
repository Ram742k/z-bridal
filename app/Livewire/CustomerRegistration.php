<?php

namespace App\Livewire;


use Livewire\Component;
use App\Models\Customer;
use Illuminate\Support\Facades\Hash;

class CustomerRegistration extends Component
{
    public $name;
    public $email;
    public $password;

    protected $rules = [
        'name' => 'required|min:6',
        'email' => 'required|email|unique:customers,email',
        'password' => 'required|min:8',
    ];

    public function submit()
    {
        $this->validate();

        Customer::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);

        session()->flash('message', 'Customer successfully registered.');

        $this->reset();
    }

    public function render()
    {
        return view('livewire.customer-registration');
    }
}
