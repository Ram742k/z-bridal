<?php

namespace App\Livewire;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Expense;
use Carbon\Carbon;

class ExpenseForm extends Component
{
    use WithFileUploads;

    public $expense_date;
    public $expense_time;
    public $amount;
    public $party;
    public $remarks;
    public $attachment;
    public $category;
    public $payment_mode;
    

    public function mount()
    {
        $this->expense_date = Carbon::now()->setTimezone('Asia/Kolkata')->format('Y-m-d');
        $this->expense_time = Carbon::now()->setTimezone('Asia/Kolkata')->format('H:i');
        
    }
    
    protected $rules = [
        'expense_date' => 'required|date_format:Y-m-d',
        'expense_time' => 'required|date_format:H:i',
        'amount' => 'required|numeric',
        'party' => 'required|string|max:255',
        'remarks' => 'nullable|string',
        'attachment' => 'nullable|file|mimes:jpg,png,pdf|max:10240',
        'category' => 'required|string|in:sale,food,grocery,health,petrol,staff salary,labour charges,maintenance,rent',
        'payment_mode' => 'required|string|in:online,cash,upi',
    ];

    public function submit()
    {
        $this->validate();

        $attachmentPath = $this->attachment ? $this->attachment->store('attachments', 'public') : null;

        Expense::create([
            'expense_date' => $this->expense_date,
            'expense_time' => $this->expense_time,
            'amount' => $this->amount,
            'party' => $this->party,
            'remarks' => $this->remarks,
            'attachment' => $attachmentPath,
            'category' => $this->category,
            'payment_mode' => $this->payment_mode,
        ]);

        session()->flash('message', 'Expense created successfully.');

        // Reset form fields after successful submission
        $this->reset(['expense_date', 'expense_time', 'amount', 'party', 'remarks', 'attachment', 'category', 'payment_mode']);
    }

    public function render()
    {
        return view('livewire.expense-form');
    }
}