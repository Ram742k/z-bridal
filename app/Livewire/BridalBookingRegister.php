<?php

namespace App\Livewire;


use Livewire\Component;
use App\Models\BridalBooking;
use PDF;

class BridalBookingRegister extends Component
{
    public $bridal_name;
    public $cell_no1;
    public $cell_no2;
    public $address;
    public $function;
    public $function_date;
    public $time;
    public $place;
    public $makeup;
    public $side_makeup = false;
    public $jewalls = false;
    public $flowers = false;
    public $total_amount;
    public $advance_amount;
    public $balance;
    public $booking;

    protected $rules = [
        'bridal_name' => 'required|string|max:255',
        'cell_no1' => 'required|string|max:15',
        'cell_no2' => 'nullable|string|max:15',
        'address' => 'nullable|string',
        'function' => 'required|in:engagement,marriage,others',
        'function_date' => 'required|date',
        'time' => 'required|date_format:H:i',
        'place' => 'nullable|string|max:255',
        'makeup' => 'required|in:hd,hdpro,air_brush,other',
        'side_makeup' => 'boolean',
        'jewalls' => 'boolean',
        'flowers' => 'boolean',
        'total_amount' => 'required|numeric',
        'advance_amount' => 'nullable|numeric',
        'balance' => 'nullable|numeric',
    ];

    public function submit()
    {
        $this->validate();

        $booking =  BridalBooking::create([
            'bridal_name' => $this->bridal_name,
            'cell_no1' => $this->cell_no1,
            'cell_no2' => $this->cell_no2,
            'address' => $this->address,
            'function' => $this->function,
            'function_date' => $this->function_date,
            'time' => $this->time,
            'place' => $this->place,
            'makeup' => $this->makeup,
            'side_makeup' => $this->side_makeup,
            'jewalls' => $this->jewalls,
            'flowers' => $this->flowers,
            'total_amount' => $this->total_amount,
            'advance_amount' => $this->advance_amount,
            'balance' => $this->balance,
        ]);

        $this->generateInvoice($booking);

        session()->flash('message', 'Bridal booking created successfully.');

        $this->reset();
    }


    public function generateInvoice($booking)
    {
        $data = [
            'booking' => $booking
        ];
    
        $pdf = PDF::loadView('invoice', $data);
    
        $filePath = storage_path('app/public/invoices/');
        $fileName = 'invoice_' . $booking->id . '.pdf';
    
        // Check if the directory exists, if not create it
        if (!file_exists($filePath)) {
            mkdir($filePath, 0777, true);
        }
    
        $pdf->save($filePath . $fileName);
    
        // Return a response to download the PDF
        return response()->download($filePath . $fileName);
    }
    
    public function render()
    {
        return view('livewire.bridal-booking-register');
    }
}
